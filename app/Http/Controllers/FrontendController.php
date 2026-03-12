<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MissionVision;
use App\Models\AboutUs;
use App\Models\PrivacyPolicy;
use App\Models\TermsConditions;
use App\Models\ReturnRefundPolicy;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Employee;
use App\Models\Client;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;
use App\Models\Message;
use App\Models\Blogs;
use App\Models\Ads;
use App\Models\Booking;
use App\Models\Review;
use App\Models\ServiceGuarantee;
use App\Models\Career;
use App\Models\NewsEvent;
use App\Models\Cerficates;
use App\Models\Administrative;
use App\Models\choose_us;

use App\Models\ProductInformation;
use App\Models\ProductCategory;
use App\Models\ProductSizeInfo;
use App\Models\ProductColorInfo;
use App\Models\ProductImage;
use App\Models\ProductBrands;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;


class FrontendController extends Controller
{
    public function index()
    {
        // session::forget('ads');
        // return Session::get('ads');

        $product = ProductInformation::where('item_id', 3)->count();
        $products = ProductInformation::where('item_id', 3)->where('status', 1)->get();

        $groupItems = $this->fetchGroupList();
        $apiProducts = $this->fetchProductList();
        $brands = $this->fetchBrands();
        $categoryIndex = $this->fetchCategories()->keyBy(fn($category) => (string) ($category['id'] ?? ''));

        $featuredCategories = $groupItems
            ->flatMap(function ($item) use ($categoryIndex) {
                return collect($item['categories'] ?? [])->map(function ($category) use ($categoryIndex) {
                    $categoryId = $category['id'] ?? null;
                    $apiCategory = !empty($categoryId) ? $categoryIndex->get((string) $categoryId) : null;
                    $rawImage = $category['image'] ?? $category['icon'] ?? $category['logo'] ?? $category['thumbnail'] ?? null;

                    return [
                        'id' => $categoryId,
                        'name' => $category['name'] ?? ($apiCategory['name'] ?? 'Category'),
                        'slug' => $category['slug'] ?? ($apiCategory['slug'] ?? null),
                        'image' => $apiCategory['image'] ?? $this->inventoryMediaUrl($rawImage),
                    ];
                });
            })
            ->filter(fn($category) => !empty($category['id']))
            ->unique('id')
            ->take(12)
            ->values();

        $itemWiseProducts = $groupItems->take(4)->map(function ($item) use ($apiProducts) {
            $itemId = $item['id'] ?? null;

            return [
                'item_id' => $itemId,
                'item_name' => $item['name'] ?? 'Item',
                'categories' => collect($item['categories'] ?? [])->map(function ($category) {
                    return [
                        'id' => $category['id'] ?? null,
                        'name' => $category['name'] ?? 'Category',
                        'slug' => $category['slug'] ?? null,
                    ];
                })->filter(fn ($category) => !empty($category['id']))->values()->all(),
                'products' => $apiProducts
                    ->filter(function ($product) use ($itemId) {
                        return (string) ($product['item_id'] ?? '') === (string) $itemId;
                    })
                    ->take(8)
                    ->values()
                    ->all(),
            ];
        })->values();

        $employee = Employee::where('status', 1)->orderBy('sl', 'ASC')->get();

        $client = Client::where('status', 1)->get();

        $blog = Blogs::where('status', 1)->get();

        $choose = choose_us::where('status', 1)->get();

        $slider = PhotoGallery::where('slider', 1)->where('status', 1)->orderBy('id', 'ASC')->get();

        $cerficates = Cerficates::where('status', 1)->orderBy('sl', 'ASC')->get();

        $ads = Ads::all();

        $data = AboutUs::find(1);

        $missionvision = MissionVision::find(1);

        $news = NewsEvent::where('status', 1)->orderBy('date', 'DESC')->get();

        $adminmessage = Administrative::where('status', 1)->orderBy('sl', 'ASC')->get();

        // return $slider;

        return view("frontend.index", compact('product', 'products', 'slider', 'cerficates', 'employee', 'client', 'blog', 'ads', 'data', 'news', 'missionvision', 'adminmessage', 'choose', 'itemWiseProducts', 'brands', 'featuredCategories'));
    }

    public function brand_products(Request $request, $id)
    {
        $brands = $this->fetchBrands();
        $brand = $brands->first(function ($brandItem) use ($id) {
            return (string) ($brandItem['id'] ?? '') === (string) $id;
        });

        abort_if(!$brand, 404);

        $allProducts = $this->fetchProductList()->filter(function ($product) use ($id) {
            return (string) ($product['brand_id'] ?? '') === (string) $id;
        })->values();

        $page = max((int) $request->get('page', 1), 1);
        $perPage = 12;
        $pageItems = $allProducts->slice(($page - 1) * $perPage, $perPage)->values();

        $pagination = new LengthAwarePaginator(
            $pageItems,
            $allProducts->count(),
            $perPage,
            $page,
            [
                'path' => url('brand_products/' . $id),
            ]
        );

        return view('frontend.brand_products', [
            'brand' => $brand,
            'products' => $pageItems,
            'pagination' => $pagination,
        ]);
    }

    public function item_products(Request $request, $id)
    {
        $groupItems = $this->fetchGroupList();
        $item = $groupItems->first(function ($groupItem) use ($id) {
            return (string) ($groupItem['id'] ?? '') === (string) $id;
        });

        abort_if(!$item, 404);

        $allProducts = $this->fetchProductList()->filter(function ($product) use ($id) {
            return (string) ($product['item_id'] ?? '') === (string) $id;
        })->values();

        $page = max((int) $request->get('page', 1), 1);
        $perPage = 12;
        $pageItems = $allProducts->slice(($page - 1) * $perPage, $perPage)->values();

        $pagination = new LengthAwarePaginator(
            $pageItems,
            $allProducts->count(),
            $perPage,
            $page,
            [
                'path' => url('item_products/' . $id),
            ]
        );

        return view('frontend.item_products', [
            'item' => $item,
            'products' => $pageItems,
            'pagination' => $pagination,
        ]);
    }

    public function category_products(Request $request, $id)
    {
        $categories = $this->fetchCategories();
        $category = $categories->first(function ($categoryItem) use ($id) {
            return (string) ($categoryItem['id'] ?? '') === (string) $id;
        });

        abort_if(!$category, 404);

        $allProducts = $this->fetchProductList()->filter(function ($product) use ($id) {
            return (string) ($product['category_id'] ?? '') === (string) $id;
        })->values();

        $page = max((int) $request->get('page', 1), 1);
        $perPage = 12;
        $pageItems = $allProducts->slice(($page - 1) * $perPage, $perPage)->values();

        $pagination = new LengthAwarePaginator(
            $pageItems,
            $allProducts->count(),
            $perPage,
            $page,
            [
                'path' => url('category_products/' . $id),
            ]
        );

        return view('frontend.category_products', [
            'category' => $category,
            'products' => $pageItems,
            'pagination' => $pagination,
        ]);
    }

    public function all_categories()
    {
        $groupItems = $this->fetchGroupList();
        $categoryIndex = $this->fetchCategories()->keyBy(fn($category) => (string) ($category['id'] ?? ''));
        $productCountByCategory = $this->fetchProductList()
            ->filter(fn($product) => !empty($product['category_id']))
            ->groupBy(fn($product) => (string) ($product['category_id'] ?? ''))
            ->map(fn($products) => $products->count());

        $itemWiseCategories = $groupItems->map(function ($item) use ($categoryIndex, $productCountByCategory) {
            $categories = collect($item['categories'] ?? [])->map(function ($category) use ($categoryIndex, $productCountByCategory) {
                $categoryId = $category['id'] ?? null;
                $categoryIdKey = (string) $categoryId;
                $apiCategory = !empty($categoryId) ? $categoryIndex->get((string) $categoryId) : null;
                $rawImage = $category['image'] ?? $category['icon'] ?? $category['logo'] ?? $category['thumbnail'] ?? null;

                return [
                    'id' => $categoryId,
                    'name' => $category['name'] ?? ($apiCategory['name'] ?? 'Category'),
                    'slug' => $category['slug'] ?? ($apiCategory['slug'] ?? null),
                    'image' => $apiCategory['image'] ?? $this->inventoryMediaUrl($rawImage),
                    'products_count' => (int) ($productCountByCategory->get($categoryIdKey, 0)),
                    'is_popular' => (bool) (
                        $apiCategory['is_popular'] ??
                            $apiCategory['popular'] ??
                            $category['is_popular'] ??
                            $category['popular'] ??
                            false
                    ),
                ];
            })->filter(fn($category) => !empty($category['id']))
                ->unique('id')
                ->values();

            return [
                'item_id' => $item['id'] ?? null,
                'item_name' => $item['name'] ?? 'Item',
                'categories' => $categories,
            ];
        })->filter(fn($itemGroup) => collect($itemGroup['categories'])->isNotEmpty())
            ->values();

        return view('frontend.all_categories', [
            'itemWiseCategories' => $itemWiseCategories,
        ]);
    }

    public function shop(Request $request)
    {
        $page = max((int) $request->get('page', 1), 1);
        $search = trim((string) $request->get('search', ''));
        $sort = (string) $request->get('sort', '');

        $endpoint = 'https://inventory.geelbd.com/api/feature/product';
        $products = [];
        $pagination = [];

        // Fallback for APIs that ignore search/sort parameters.
        if ($search !== '' || $sort !== '') {
            $cachedDataset = Cache::get('shop.feature_products.dataset.v1');

            if (empty($cachedDataset)) {
                try {
                    $cachedDataset = Cache::remember('shop.feature_products.dataset.v1', now()->addMinutes(5), function () use ($endpoint) {
                        $firstPageResponse = Http::timeout(10)->post($endpoint, [
                            'type' => 0,
                            'page' => 1,
                        ]);

                        if (!$firstPageResponse->successful()) {
                            return [
                                'per_page' => 12,
                                'products' => [],
                            ];
                        }

                        $firstPageResult = $firstPageResponse->json();
                        $firstPageData = $firstPageResult['data'] ?? [];

                        $perPage = (int) ($firstPageData['per_page'] ?? 12);
                        $lastPage = (int) ($firstPageData['last_page'] ?? 1);
                        $maxSyncPages = 20;
                        $lastPage = min($lastPage, $maxSyncPages);

                        $allProducts = collect($firstPageData['data'] ?? []);

                        for ($p = 2; $p <= $lastPage; $p++) {
                            $pageResponse = Http::timeout(10)->post($endpoint, [
                                'type' => 0,
                                'page' => $p,
                            ]);

                            if (!$pageResponse->successful()) {
                                break;
                            }

                            $pageResult = $pageResponse->json();
                            $pageProducts = $pageResult['data']['data'] ?? [];
                            if (!empty($pageProducts)) {
                                $allProducts = $allProducts->merge($pageProducts);
                            }
                        }

                        return [
                            'per_page' => $perPage,
                            'products' => $allProducts->values()->all(),
                        ];
                    });
                } catch (\Throwable $th) {
                    $cachedDataset = [
                        'per_page' => 12,
                        'products' => [],
                    ];
                }
            }

            $perPage = (int) ($cachedDataset['per_page'] ?? 12);
            $allProducts = collect($cachedDataset['products'] ?? []);

            if ($search !== '') {
                $needle = mb_strtolower($search);
                $allProducts = $allProducts->filter(function ($product) use ($needle) {
                    $name = mb_strtolower((string) ($product['name'] ?? ''));
                    return str_contains($name, $needle);
                })->values();
            }

            if ($sort === 'low_to_high' || $sort === 'high_to_low' || $sort === 'newest') {
                $allProducts = $allProducts->sort(function ($a, $b) use ($sort) {
                    $aPrice = (float) (($a['product_detail']['sale_price'] ?? 0) ?: ($a['product_detail']['regular_price'] ?? 0));
                    $bPrice = (float) (($b['product_detail']['sale_price'] ?? 0) ?: ($b['product_detail']['regular_price'] ?? 0));
                    $aId = (int) ($a['id'] ?? 0);
                    $bId = (int) ($b['id'] ?? 0);

                    if ($sort === 'low_to_high') {
                        return $aPrice <=> $bPrice;
                    }

                    if ($sort === 'high_to_low') {
                        return $bPrice <=> $aPrice;
                    }

                    return $bId <=> $aId;
                })->values();
            }

            $total = $allProducts->count();
            $pageItems = $allProducts->slice(($page - 1) * $perPage, $perPage)->values();

            $paginator = new LengthAwarePaginator(
                $pageItems,
                $total,
                $perPage,
                $page,
                [
                    'path' => url('shop'),
                    'query' => array_filter([
                        'search' => $search,
                        'sort' => $sort,
                    ]),
                ]
            );

            $products = $paginator->items();
            $pagination = [
                'links' => $paginator->linkCollection()->toArray(),
            ];
        } else {
            try {
                $baseQuery = [
                    'type' => 0,
                    'page' => $page,
                    'search' => $search,
                    'sort' => $sort,
                ];

                $response = Http::timeout(10)->post($endpoint, $baseQuery);
                $result = $response->json();

                $products = $result['data']['data'] ?? [];
                $pagination = $result['data'] ?? [];
            } catch (\Throwable $th) {
                $products = [];
                $pagination = ['links' => []];
            }
        }

        if ($request->ajax()) {
            return view('frontend.partials.products_grid', compact('products', 'pagination', 'search', 'sort'))->render();
        }

        return view('frontend.shop', compact('products', 'pagination', 'search', 'sort'));
    }

    public function sell_page($id)
    {
        $response = Http::post(
            'https://inventory.geelbd.com/api/single/product',
            [
                'id' => $id
            ]
        );

        $result = $response->json();

        // Correct data path
        $product = $result['data']['product'] ?? $result['data'] ?? null;

        return view('frontend.sell_page', compact('product'));
    }

    public function about()
    {
        $data = AboutUs::find(1);

        $employee = Employee::where('status', 1)->get();
        $client = Client::where('status', 1)->get();

        return view("frontend.about", compact('data', 'employee', 'client'));
    }

    public function missionvision()
    {
        $data = MissionVision::find(1);

        return view("frontend.missionvision", compact('data'));
    }

    public function service_area($id)
    {
        $data = ServiceCategory::where('id', $id)->first();

        return view("frontend.service_area", compact('data'));
    }

    public function service_detail($id)
    {
        $data = Service::where('id', $id)->first();

        return view("frontend.service_detail", compact('data'));
    }

    public function ads_details($id)
    {
        $data = Ads::where('id', $id)->first();

        return view("frontend.ads_details", compact('data'));
    }

    public function blogs()
    {
        $data = Blogs::where('status', 1)->get();

        return view("frontend.blogs", compact('data'));
    }

    public function blog_details($id)
    {
        $data = Blogs::where('id', $id)->first();

        return view("frontend.blog_details", compact('data'));
    }

    public function newsevent()
    {
        $data = NewsEvent::where('status', 1)->get();

        return view("frontend.newsevent", compact('data'));
    }

    public function newsevents_details($id)
    {
        $data = NewsEvent::where('id', $id)->first();

        return view("frontend.newsevents_details", compact('data', 'id'));
    }


    public function careers()
    {
        $data = Career::where('status', 1)->get();

        return view("frontend.careers", compact('data'));
    }

    public function career_details($id)
    {
        $data = Career::where('id', $id)->first();

        return view("frontend.career_details", compact('data'));
    }

    public function cerficate()
    {
        return redirect('gallery');
    }

    public function privacypolicy()
    {
        $data = PrivacyPolicy::find(1);
        return view("frontend.privacypolicy", compact('data'));
    }

    public function termsconditions()
    {
        $data = TermsConditions::find(1);
        return view("frontend.termsconditions", compact('data'));
    }

    public function returnrefund()
    {
        $data = ReturnRefundPolicy::find(1);
        return view("frontend.returnrefund", compact('data'));
    }

    public function serviceguarantee()
    {
        $data = ServiceGuarantee::find(1);
        return view("frontend.serviceguarantee", compact('data'));
    }

    public function BookService(Request $request, $id)
    {
        try {
            $data = array(
                'service_id' => $id,
                'booking_date' => $request->booking_date,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'notes' => $request->notes,
            );

            $insert = Booking::create($data);

            toastr()->success(__('Booking Done, Your Will Recieve A Call Or Email From Us'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage(), __('common.error'), ['timeOut' => 5000]);
            return redirect()->back();
        }
    }

    public function sendReview(Request $request, $id)
    {
        try {
            $data = array(
                'service_id' => $id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'review' => $request->review,
                'status' => '0',
            );

            $insert = Review::create($data);

            toastr()->success(__('Thank You For Your Valuable Feedback.'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage(), __('common.error'), ['timeOut' => 5000]);
            return redirect()->back();
        }
    }

    public function team()
    {
        $data = Employee::where('status', 1)->get();

        return view("frontend.team", compact('data'));
    }

    public function gallery()
    {
        $data = PhotoGallery::where('status', 1)->whereNull('slider')->orderBy('sl', 'DESC')->get();

        return view("frontend.gallery", compact('data'));
    }

    public function videoalbum()
    {
        $data = VideoGallery::where('status', 1)->orderBy('id', 'DESC')->get();

        return view("frontend.videoalbum", compact('data'));
    }

    public function contact()
    {
        $client = Client::where('status', 1)->get();

        return view("frontend.contact", compact('client'));
    }

    public function sendMessage(Request $request)
    {
        try {
            $data = array(
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
            );

            $insert = Message::create($data);

            toastr()->success(__('Thank You For Your Valuable Message.'), __('common.success'), ['timeOut' => 5000]);
            return redirect()->back();
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage(), __('common.error'), ['timeOut' => 5000]);
            return redirect()->back();
        }
    }

    public function categorie_product($id)
    {
        // return $id;
        $categories = ProductCategory::where('id', $id)->first();
        $products = ProductInformation::where('category_id', $id)->where('status', 1)->get();
        $total_products = ProductInformation::where('category_id', $id)->where('status', 1)->count();
        return view('frontend.categorie_product', compact('id', 'categories', 'products', 'total_products'));
    }

    public function administrative_message($id)
    {
        $data = Administrative::where('status', 1)->where('id', $id)->firstOrFail();
        return view('frontend.administrative_message', compact('data'));
    }

    protected function fetchGroupList()
    {
        try {
            return Cache::remember('home.group_list.v3', now()->addMinutes(10), function () {
                $response = Http::timeout(10)->get('https://inventory.geelbd.com/api/group/list');
                if (!$response->successful()) {
                    return collect();
                }

                $payload = $response->json();

                return collect($payload['data'] ?? []);
            });
        } catch (\Throwable $th) {
            return collect();
        }
    }

    protected function fetchCategories()
    {
        try {
            return Cache::remember('home.category_list.v1', now()->addMinutes(10), function () {
                $response = Http::timeout(10)->get('https://inventory.geelbd.com/api/category/list');

                if (!$response->successful()) {
                    $fallbackResponse = Http::timeout(10)->post('https://inventory.geelbd.com/api/category/list');
                    if (!$fallbackResponse->successful()) {
                        return collect();
                    }

                    $payload = $fallbackResponse->json();
                } else {
                    $payload = $response->json();
                }

                $rawCategories = collect($payload['data']['data'] ?? $payload['data'] ?? []);

                return $rawCategories
                    ->map(function ($category) {
                        $rawImage = $category['image'] ?? $category['icon'] ?? $category['logo'] ?? $category['thumbnail'] ?? null;

                        return [
                            'id' => $category['id'] ?? null,
                            'name' => $category['name'] ?? $category['category_name'] ?? 'Category',
                            'slug' => $category['slug'] ?? null,
                            'image' => $this->inventoryMediaUrl($rawImage),
                            'items_count' => (int) (
                                $category['items_count'] ??
                                    $category['item_count'] ??
                                    $category['product_count'] ??
                                    $category['products_count'] ??
                                    0
                            ),
                            'is_popular' => (bool) ($category['is_popular'] ?? $category['popular'] ?? false),
                        ];
                    })
                    ->filter(fn($category) => !empty($category['id']))
                    ->unique('id')
                    ->values();
            });
        } catch (\Throwable $th) {
            return collect();
        }
    }

    protected function fetchProductList($maxPages = 10)
    {
        try {
            return Cache::remember('home.product_list.v2', now()->addMinutes(10), function () use ($maxPages) {
                $products = collect();

                $firstResponse = Http::timeout(15)->post('https://inventory.geelbd.com/api/product/list', [
                    'page' => 1,
                ]);

                if (!$firstResponse->successful()) {
                    return collect();
                }

                $firstPayload = $firstResponse->json();
                $firstData = $firstPayload['data'] ?? [];
                $products = $products->merge($firstData['data'] ?? $firstData ?? []);

                $lastPage = (int) ($firstData['last_page'] ?? 1);
                $lastPage = min($lastPage, $maxPages);

                for ($page = 2; $page <= $lastPage; $page++) {
                    $response = Http::timeout(15)->post('https://inventory.geelbd.com/api/product/list', [
                        'page' => $page,
                    ]);

                    if (!$response->successful()) {
                        break;
                    }

                    $payload = $response->json();
                    $data = $payload['data'] ?? [];
                    $pageProducts = collect($data['data'] ?? []);

                    if ($pageProducts->isEmpty()) {
                        break;
                    }

                    $products = $products->merge($pageProducts);
                }

                return $products->values();
            });
        } catch (\Throwable $th) {
            return collect();
        }
    }

    public function certificates()
    {
        $data = Cerficates::where('status', 1)->orderBy('sl', 'ASC')->get();

        return view("frontend.certificates", compact('data'));
    }

    protected function fetchBrands()
    {
        try {
            return Cache::remember('home.brand_list.v1', now()->addMinutes(10), function () {
                $response = Http::timeout(10)->post('https://inventory.geelbd.com/api/get/brands');
                if (!$response->successful()) {
                    return collect();
                }

                $payload = $response->json();

                return collect($payload['data'] ?? []);
            });
        } catch (\Throwable $th) {
            return collect();
        }
    }

    protected function inventoryMediaUrl($path)
    {
        if (empty($path)) {
            return null;
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        return 'https://inventory.geelbd.com/storage/app/public/' . ltrim($path, '/');
    }
}
