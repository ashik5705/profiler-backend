<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Contact;
use Illuminate\Support\Facades\File;
// use Validator;

class FileController extends Controller
{
    public function create(Request $request){

        $users = [];

        $filepath = base_path() . '/public/contact-file/1.csv';

        $row = 1;

        if (($open = fopen($filepath, "r")) !== FALSE) {

            while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                // $users[] = $data;
                $row++;
                if($row != 2){
                    try{
                        $contact = new Contact;
                        // $contact->user_id = Auth::user()->id;
                        $contact->user_id = 1;
                        $contact->business_name = $data[0];
                        $contact->telephone = $data[1];
                        $contact->email = $data[2];
                        $contact->email_host = $data[3];
                        $contact->website_url = $data[4];
                        $contact->linkedin = $data[5];
                        $contact->facebook_profile = $data[6];
                        $contact->facebook_messenger = $data[7];
                        $contact->instagram = $data[8];
                        $contact->twitter = $data[9];
                        $contact->google_rank = $data[10];
                        $contact->domain_registered = $data[11];
                        $contact->domain_expiry = $data[12];
                        $contact->domain_nameserver = $data[13];
                        $contact->domain_registrar = $data[14];
                        $contact->instagram_followers = $data[15];
                        $contact->instagram_follows = $data[16];
                        $contact->instagram_total_photos = $data[17];
                        $contact->instagram_average_likes = $data[18];
                        $contact->instagram_average_comments = $data[19];
                        $contact->instagram_is_verified = $data[20];
                        $contact->instagram_highlight_reel_count = $data[21];
                        $contact->instagram_is_biz_account = $data[22];
                        $contact->instagram_account_name = $data[23];
                        $contact->yelp_ads = $data[24];
                        $contact->fb_messenger_ads = $data[25];
                        $contact->facebook_ads = $data[26];
                        $contact->instagram_ads = $data[27];
                        $contact->adwords_ads = $data[28];
                        $contact->gmaps_url = $data[29];
                        $contact->gmb_claimed = $data[30];
                        $contact->facebook_pixel = $data[31];
                        $contact->google_pixel = $data[32];
                        $contact->criteo_pixel = $data[33];
                        $contact->google_stars = $data[34];
                        $contact->google_count = $data[35];
                        $contact->yelp_stars = $data[36];
                        $contact->yelp_count = $data[37];
                        $contact->facebook_stars = $data[38];
                        $contact->facebook_count = $data[39];
                        $contact->main_category = $data[40];
                        $contact->address = $data[41];
                        $contact->city = $data[42];
                        $contact->state = $data[43];
                        $contact->zip = $data[44];
                        $contact->mobile_friendly = $data[45];
                        $contact->google_analytics = $data[46];
                        $contact->schema_markup = $data[47];
                        $contact->use_wordpress = $data[48];
                        $contact->use_shopify = $data[49];
                        $contact->linkedin_analytics = $data[50];
                        // $contact->custom_fields = '';
                        $contact->status = 1;
                        if($contact->save()){

                        }
                        return response()->json($contact);
                    }
                    catch(Exception $e){
                        return response()->json('failed',"operation failed");
                    }
                    // dd($data[0]);
                }
                // dd($users[0]);

            }

            fclose($open);
        }

        // dd($users);
    }
}
