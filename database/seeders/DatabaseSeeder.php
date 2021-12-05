<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ResetDBSeeder::class,
        ]);

        \App\Models\User::factory(1)->unverified()->create([
            'name'     => 'admin',
            'email'    => 'admin@sg-egypt.com',
            'password' => \Hash::make('12345678')
        ]);

        \App\Models\Section::factory(1)->type('seo-section')->create([
            'name'        => 'website name',
            'data'        => [
                'description' => 'description of website',
                'keywords' => 'se, su, ss, as,',
            ]
        ]);

        \App\Models\Section::factory(1)->type('about-us-section')->create([
            'name'        => 'about-us-section-header',
            'description' => 'Saudi Gulf Group was established 15 years ago in Riyadh – the Kingdom of Saudi Arabia as a company specialized in the field of contracting, restoration, final finishing, and maintenance works',
        ]);
        \App\Models\Section::factory(1)->type('contact-us-section')->create([
            'name'        => 'contact-us-section-header',
            'description' => 'Saudi Gulf Group was established 15 years ago in Riyadh – the Kingdom of Saudi Arabia as a company specialized in the field of contracting, restoration, final finishing, and maintenance works',
            'data'        => [
                'address'    => '56 Makram Ebaid St. Nasr City, Banque Misr Building - 10th Floor',
                'work_time'  => 'Sun to Thu: 09:00am to 05:00pm',
                'phone_1'    => '+2-0100011333',
                'phone_2'    => '2-02-2322222',
                'iframe_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.166015921346!2d31.347292884253346!3d30.06077542475458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583f9a722d8d4f%3A0xa9b1a81a4c1b2330!2sSaudi%20Gulf%20Group!5e0!3m2!1sar!2seg!4v1624456587480!5m2!1sar!2seg'
            ]
        ]);

        \App\Models\Section::factory(1)->type('slider-section')->create([
            'name'        => 'KEEP CALM AND RELAX',
            'sub_name'    => 'No more searching for companies',
            'description' => 'No more fuss, We provide you all the services your home needs, quality to your liking, at competitive prices'
        ]);
        \App\Models\Section::factory(1)->type('coupon-section')->create([
            'name'     => 'WELCOME SUMMER',
            'sub_name' => 'Get 50% Discount on Housekeeping in North coast',
        ]);
        \App\Models\Section::factory(1)->type('story-section')->create([
            'name'        => 'Saudi Gulf Group',
            'sub_name'    => 'Our story',
            'description' => 'was established 15 years ago in Riyadh – the Kingdom of Saudi Arabia as a company specialized in the field of contracting, restoration, final finishing, and maintenance works. We also provide our clients with architectural design, structural design, interior design, and decorations. We have a staff of workers who are specialized in this field, such as civil engineers, management engineers, maintenance workers, and trained manpower. Throughout our history, we have provided all services in the fields of project planning, construction, and restoration, and we have implemented various projects, including palaces, private villas, malls, restaurants, cafeterias, hospitals, administrative headquarters, schools, and public facilities.'
        ]);
        \App\Models\Section::factory(1)->type('service-section')->create([
            'name'     => 'our services',
            'sub_name' => 'TRUST WITH US, WE CA DO THE BEST',
        ]);
        \App\Models\Section::factory(1)->type('integrated-section')->create([
            'name'        => 'Integrated Facility Management And Maintenance Services',
            'description' => 'We pledge to establish lasting partnership relations with our clients and gain their confidence through our experience and our exceptional team.',
            'data' => [
                'Qualified Team of Engineers & Experts',
                'Solid portfolio across KSA and Egypt',
                'Innovative Solutions to Time/Budget Challenges'
            ]
        ]);
        \App\Models\Section::factory(1)->type('portfolio-section')->create([
            'name'     => 'WE LET THE THE ART TO TALK ABOUT US',
            'sub_name' => 'Our Portfolio',
        ]);
        \App\Models\Section::factory(1)->type('family-section')->create([
            'name'        => 'We are not a company, We are Family',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        ]);

        \App\Models\Section::factory(1)->type('story-page-one-section')->create([
            'name'        => 'Video',
        ]);
        \App\Models\Section::factory(1)->type('story-page-two-section')->create([
            'name'            => 'Our Story',
            'description'     => 'Saudi Gulf Group was established 15 years ago in Riyadh – the Kingdom of Saudi Arabia as a company specialized in the field of contracting, restoration, final finishing, and maintenance works. We also provide our clients with architectural design, structural design, interior design, and decorations. We have a staff of workers who are specialized in this field, such as civil engineers, management engineers, maintenance workers, and trained manpower.',
            'sub_description' => 'Throughout our history, we have provided all services in the fields of project planning, construction, and restoration, and we have implemented various projects, including palaces, private villas, malls, restaurants, cafeterias, hospitals, administrative headquarters, schools, and public facilities.',
        ]);
        \App\Models\Section::factory(1)->type('story-page-three-section')->create([
            'name'            => 'Vision Statement',
            'description'     => 'Saudi Gulf Group seeks to provide integrated facility management and maintenance services to our clients and we pledge to establish lasting partnership relations with our clients and gain their confidence through our experience and our exceptional team. We look forward to providing the highest levels of service to our clients in a short time and with exceptional quality.',
            'sub_description' => 'Our vision is to maintain its growth as one of the leading Saudi groups in the field of integrated general contractings.',
        ]);
        \App\Models\Section::factory(1)->type('story-page-four-section')->create([
            'name'    => 'Values & Principles',
            'data' => [
                'Partnership for success: Cooperating with our clients as partners in all project phases with all its details and challenges',
                'Honesty and Loyalty: Our relationship with our clients is based mainly on loyalty and honesty in order to gain their trust and deal with them more than once.',
                'Overcoming Challenges: We have a full commitment to finding innovative and new solutions to any time or material challenges facing our customers'
            ]
        ]);

        \App\Models\Client::factory(1)->create();
        \App\Models\Portfolio::factory(1)->create();
        \App\Models\Service::factory(1)->create();
        \App\Models\Package::factory(1)->create();
    }
}
