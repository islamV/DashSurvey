<?php
namespace App\Dash\Notifications;
use App\Models\User;
use Dash\Notification;
use Modules\Complaints\App\Models\Complaint;

class ComplaintNotifictaions extends Notification {


	/**
	 * if you want append realtime js or some js code
	 * you have 2 ways js,blade file or both to append your code in stack
	 * @return array<string>
	 */
	public static function stack() {
		return [
			'js' => [
				// url('test.js'), // js url
			],
			'blade' => [
				 'pusher', //test.blade.php
			],
		];
	}

	/**
	 * you can add unread count to append in total unread or unseen
	 * notification
	 * you must return a number
	 * @return int
	 */
	public static function unreadCount() {
		return Complaint::where('show_status' , '0')->orderBy('created_at','desc')->count();

	}

	/**
	 * you can render list item here using blade file to
	 * append it in notification list in horn icon
	 * @return string
	 */
	public static function content() {
			$lists = Complaint::where('show_status' ,'0')->orderBy('created_at','desc')->with('survey')->get();

		$data  = '';
		foreach ($lists as $complaint) {
			$data .= view('ComplaintNotifictaions_notifications', ['complaint' => $complaint])->render();
		}
		return $data;
	}
}
