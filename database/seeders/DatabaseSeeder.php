<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MenuLabelsTableSeeder::class);
        $this->call(ActionsTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(ActivityLogsTableSeeder::class);
        $this->call(HistoriesTableSeeder::class);
        $this->call(ProductItemsTableSeeder::class);
        $this->call(ProductCategoriesTableSeeder::class);
        $this->call(ProductSubCategoriesTableSeeder::class);
        $this->call(ProductBrandsTableSeeder::class);
        $this->call(UnitsTableSeeder::class);
        $this->call(SubUnitsTableSeeder::class);
        $this->call(ProductSizesTableSeeder::class);
        $this->call(ProductColorsTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(ProductInformationsTableSeeder::class);
        $this->call(AboutUsTableSeeder::class);
        $this->call(CompanyProfilesTableSeeder::class);
        $this->call(TermsConditionsTableSeeder::class);
        $this->call(ReturnRefundPoliciesTableSeeder::class);
        $this->call(PrivacyPoliciesTableSeeder::class);
        $this->call(PhotoGalleriesTableSeeder::class);
        $this->call(VideoGalleriesTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(ServiceGuaranteesTableSeeder::class);
    }
}
