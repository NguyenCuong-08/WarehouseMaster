<?php

namespace App\Console\Commands;

use App\Console\Commands\Website\CrawlWebsiteBase;
//use App\Models\Product;
//use App\Models\Website;
use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Setting;

class CheckHanMuaGoiAndUpdateStatus extends Command
{

    use DispatchesJobs;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:check-and-update-status';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Kiểm tra và cập nhật trạng thái admin nếu ngày mua đơn cuối cách ngày hiện tại quá 30 ngày';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Lấy ngày hiện tại
        $now = Carbon::now();
        $so_ngay_khoa_vi = Setting::where('name','so_ngay_khoa_vi')->first()->value;
        // Lấy tất cả admin
        $admins = Admin::all();

        foreach ($admins as $admin) {
            // Kiểm tra nếu ngày mua đơn cuối cách ngày hiện tại quá số ngày khóa ví
            if ($admin->ngay_mua_don_cuoi && $now->diffInDays(Carbon::parse($admin->ngay_mua_don_cuoi)) > $so_ngay_khoa_vi) {
                // Cập nhật trạng thái admin thành 'khóa'
                $admin->status = '0';
                $admin->vi_tien_status = '0';
                $admin->save();
            }
        }

        $this->info('Kiểm tra và cập nhật trạng thái admin hoàn tất.');
    }
}
