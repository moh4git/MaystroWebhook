# MaystroWebhook
Maystro delivery webhook trait package

How to use:

Installation

You can install the package via composer:

<pre>composer require moh4git/maystro-webhook</pre>

Now run this php artisan command :

<pre>php artisan webhook:install</pre>

This command will create a controller inside : app\Http\Controllers\MaystroDelivery

<pre>
namespace App\Http\Controllers\MaystroDelivery;

use App\Http\Controllers\Controller;
use MaystroWebhook\MaystroWebhook;
use Illuminate\Http\Request;

class MaystroDeliveryController extends Controller
{
    use MaystroWebhook;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function responseData()
    {
        \Log::debug(['log_type' => 'test1', 'data' => $this->response_data]);
        return response('OK', 200);
    }
}
</pre>

<h2 dir="auto">Usage</h2>

Register the route https://yourdomainname.com/maystro/webhook/endpoint inside your Maystro account in webhooks tab 
