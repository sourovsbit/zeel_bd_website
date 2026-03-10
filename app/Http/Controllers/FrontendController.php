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
use Illuminate\Support\Facades\Http;


class FrontendController extends Controller
{
    public function index()
    {
        // session::forget('ads');
        // return Session::get('ads');

        $product = ProductInformation::where('item_id', 3)->count();
        $products = ProductInformation::where('item_id', 3)->where('status', 1)->get();

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

        return view("frontend.index", compact('product', 'products', 'slider', 'cerficates', 'employee', 'client', 'blog', 'ads', 'data', 'news', 'missionvision', 'adminmessage', 'choose'));
    }

    public function shop(Request $request)
    {
        $page = $request->get('page', 1);
        $search = $request->get('search', null);
        $sort = $request->get('sort', null);

        $query = [
            'type' => 0,
            'page' => $page,
        ];

        if ($sort) {
            $query['sort'] = $sort;
        }

        $response = Http::post('https://inventory.geelbd.com/api/feature/product', $query);
        $result = $response->json();
        $products = $result['data']['data'] ?? [];
        $pagination = $result['data'] ?? [];

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
            toastr()->error($th->getMessages(), __('common.error'), ['timeOut' => 5000]);
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
            toastr()->error($th->getMessages(), __('common.error'), ['timeOut' => 5000]);
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
            toastr()->error($th->getMessages(), __('common.error'), ['timeOut' => 5000]);
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
}
