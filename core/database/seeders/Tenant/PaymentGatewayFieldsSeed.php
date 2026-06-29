<?php

namespace Database\Seeders\Tenant;


use App\Helpers\ImageDataSeedingHelper;
use App\Models\PaymentGateway;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentGatewayFieldsSeed extends Seeder
{
    public function run()
    {
        DB::statement("INSERT INTO `payment_gateways` (`id`, `name`, `image`, `description`, `status`, `test_mode`, `credentials`, `created_at`, `updated_at`) VALUES
        (1,'paypal','465','if your currency is not available in paypal, it will convert you currency value to USD value based on your currency exchange rate.',1,1,'{\"sandbox_client_id\":null,\"sandbox_client_secret\":null,\"sandbox_app_id\":null,\"live_client_id\":null,\"live_client_secret\":null,\"live_app_id\":null}','2022-04-17 07:54:18','2023-08-17 16:29:35'),
        (2,'paytm','312','if your currency is not available in paytm, it will convert you currency value to INR value based on your currency exchange rate.',1,1,'{\"merchant_key\":null,\"merchant_mid\":null,\"merchant_website\":null,\"channel\":null,\"industry_type\":null}','2022-04-17 07:54:18','2023-08-17 16:29:54'),
        (3,'stripe','315','',1,1,'{\"public_key\":null,\"secret_key\":null}','2022-04-17 07:54:18','2023-08-17 16:30:01'),
        (4,'razorpay','313','if your currency is not available in Razorpay, it will convert you currency value to INR value based on your currency exchange rate.',1,1,'{\"api_key\":null,\"api_secret\":null}','2022-04-17 07:54:18','2023-08-17 16:30:12'),
        (5,'paystack','311','if your currency is not available in Paystack, it will convert you currency value to NGN value based on your currency exchange rate.',1,1,'{\"public_key\":null,\"secret_key\":null,\"merchant_email\":null}','2022-04-17 07:54:18','2023-08-17 16:30:24'),
        (6,'mollie','307','if your currency is not available in mollie, it will convert you currency value to USD value based on your currency exchange rate.',1,1,'{\"public_key\":null}','2022-04-17 07:54:18','2023-08-17 16:30:32'),
        (8,'midtrans','305','',1,1,'{\"merchant_id\":null,\"server_key\":null,\"client_key\":null}','2022-04-17 07:54:18','2023-08-17 16:30:39'),
        (10,'cashfree','316','',1,1,'{\"app_id\":null,\"secret_key\":null}','2022-04-17 07:54:18','2023-08-17 16:30:46'),
        (11,'instamojo','314','',1,1,'{\"client_id\":null,\"client_secret\":null,\"username\":null,\"password\":null}','2022-04-17 07:54:18','2023-08-17 16:30:52'),
        (12,'marcadopago','306','',1,1,'{\"client_id\":null,\"client_secret\":null}','2022-04-17 07:54:18','2023-08-17 16:30:59'),
        (13,'zitopay','441','',1,1,'{\"username\":null}','2022-07-26 12:34:58','2023-08-17 16:31:05'),
        (14,'squareup','442','',1,1,'{\"location_id\":null,\"access_token\":null}','2022-07-26 12:34:58','2023-08-17 16:31:11'),
        (15,'cinetpay','443','',1,1,'{\"apiKey\":null,\"site_id\":null}','2022-07-26 12:34:58','2023-08-17 16:31:16'),
        (16,'paytabs','444','',1,1,'{\"profile_id\":null,\"region\":null,\"server_key\":null}','2022-07-26 12:34:58','2023-08-17 16:31:23'),
        (17,'billplz','445','',1,1,'{\"key\":null,\"version\":null,\"x_signature\":null,\"collection_name\":null}','2022-07-26 12:34:58','2023-08-17 16:31:35'),
        (19,'toyyibpay','446','',1,1,'{\"client_secret\":null,\"category_code\":null}','2022-12-05 17:54:12','2023-08-17 16:31:42'),
        (20,'flutterwave','447','if your currency is not available in flutterwave, it will convert you currency value to USD value based on your currency exchange rate.',1,1,'{\"public_key\":null,\"secret_key\":null,\"secret_hash\":null}','2022-12-05 17:56:40','2023-08-17 16:31:50'),
        (21,'payfast','308','',1,1,'{\"merchant_id\":null,\"merchant_key\":null,\"passphrase\":null,\"itn_url\":null}','2022-12-05 17:56:40','2023-08-17 16:32:01'),
        (22,'manual_payment','310','',1,1,'{\"name\":\"Manual Payment\",\"description\":\"Manual Payment Here\"}','2022-04-17 07:54:18','2022-12-21 11:31:31'),
        (23,'iyzipay','0','',1,1,'{\"secret_key\":\"Manual Payment\",\"api_key\":\"Manual Payment Here\"}','2022-04-17 07:54:18','2022-12-21 11:31:31')");
    }
}
