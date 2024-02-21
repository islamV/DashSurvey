<?php
namespace App\Policies;
use Dash\Policies\Policy;

class GuestsPolicy extends Policy {

    /**
	 * Resource Policy Name
	 * @var string $resource
	 */
	protected $resource = 'guests';

}
