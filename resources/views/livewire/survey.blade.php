<div>

    <form wire:submit.prevent=  "submit">
        @if ($firstFrom)
            <div class="Information">
                <span class="title">{{ __('survey.guest_information') }}</span>

                <div class="fields">
                    <div class="input-field">
                        <label>First Name</label>
                        <input type="text" wire:model="first_name" placeholder="Enter your first name">
                    </div>
                    <div class="input-field">
                        <label>Last name</label>
                        <input type="text" wire:model="last_name" placeholder="Enter your last name">
                    </div>

                    <div class="input-field">
                        <label>Mobile Number</label>
                        <input type="text" wire:model="phone" placeholder="Enter mobile number">
                    </div>

                </div>
            </div>


            <button class="nextBtn" wire:click.prevent="toggelFrom">
                <span class="btnText">Next</span>
                <i class="uil uil-navigator"></i>
            </button>
        @endif
        @if ($lastFrom)


            <div class="Survey">
                <span class="title">{{ __('survey.title') }}</span>

                <div class="fields">
                    <div class="input-field">
                        <label>select service </label>
                        <select id="" wire:model="selectService">
                            <option value="">اختار من القائمة</option>
                            <option value="1">فنادق</option>
                            <option value="2">مستوصفات</option>
                            <option value="3">كوفي شوب</option>
                        </select>
                    </div>
                    @if ($selectService)
              
                    <div class="input-field">
                        <label>select section</label>
                        <select >
                            <option value="" selected>اختار من القائمة</option>
                            @foreach ($sections as $section)
                                <option value="{{ $section }}">{{ $section }}</option>
                            @endforeach
                        </select>
                    </div>
                
            @endif
                </div>

              


                <div class="buttons">
                    <div class="backBtn" wire:click.prevent="toggelFrom">
                        <i class="uil uil-navigator"></i>
                        <span class="btnText">Back</span>
                    </div>

                    <button class="sumbit" type="submit">
                        <span class="btnText">Submit</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div>
        @endif
    </form>
</div>
