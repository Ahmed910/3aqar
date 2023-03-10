<?php
$default_msg = 'تم السماح لكم بعمل الرحلات على باقة '. (setting('price_of_default_package_order') ?? 1). ' ريال لكل رحلة. وللاستفاده بعدد لامحدود من الرحلات قم بالاشتراك بإحدى الباقات المتوفرة لدينا';
$home_msg = setting('home_msg_'.app()->getLocale()) ? setting('home_msg_'.app()->getLocale()) : $default_msg;
return[
    'auth' => [
        'reset_code_is' => 'reset code is :code',
        'verified_code_is' => 'verified code is :code',
        'failed'   => 'These credentials do not match our registered data.',
        'sign_with_not_active' => "Successfully registered, please activate your account ",
        'sign_with_active' => "successfully registered",
        'you_already_have_password' => 'you already have password',
        'you_should_add_password' => 'you should add password',
        'user_not_found' => 'The phone number is incorrect or the account is not activated',
        'code_true' => 'The entered code is correct',
        'code_not_true' => 'The code is incorrect',
        'success_change_password' => "success change password",
    ],
    'messages' => [
        'countries_not_found'=>'countries not found',
        'success_sign_up' => "Successfully registered, please activate your account ",

        'certificates_has_been_updated'=>'certificates has been updated',
        'to_add_new_period_must_be_after_existing_period_or_you_added_the_schedule_before'=>'to add new period must be after existing period or you added the schedule before',
        'please_register_for_interview'=>'please register for interview',

        'plz_complete_register'=>'plz complete register',
        'ad_deleted_successfully'=>'ad deleted successfully',
        'ad_is_closed_successfully'=>'ad is closed successfully',
        'image_deleted'=>'image_deleted',
        'plz_wait_for_interview_result'=>'plz_wait_for_interview_result',
         'contract_created_successfully'=>'contract created successfully',
        'childern_delivered_successfully'=>'childern delivered successfully and booking status changed',
        'phone_is_used_before' => 'phone is used before',
        'you_must_be_accepted_from_adminstration_to_complete_register'=>'you must be accepted from adminstration to complete register',
        'user_data_updated_successfully'=>'your profile has been updated successfully',

        'old_password_is_invalid'=>'old password is invalid',
        'your_bank_account_deleted_successfully'=>'your bank account deleted successfully',

        'deleted_succussfully'=>'deleted succussfully',
        'ad_created_successfully'=>'ad created successfully',
        'ad_updated_successfully'=>'ad updated successfully',
        'The_request_has_been_approved_before'=>'The request has been approved before',
        'The_request_has_been_approved'=>'The request has been approved',
        'start_working'=>'start working',
        'Age_must_be_greater_than_25'=>'Age must be greater than 25',
        'you_must_have_accepted_the_request_in_advance'=>'you must have accepted the request in advance',
        'you_cant_cancel_request_while_start_working'=>'you cant cancel request while start working',
        'you_cant_cancel_request_while_request_is_finished'=>'you cant cancel request while request is finished',
        'request_finished'=>'request finished',
        'amount_due_has_been_sent'=>'تم ارسال المبلغ المستحق',
        'the_request_must_have_been_completed'=>'The request must have been completed',
        'request_has_been_rejected'=>'request has been rejected',
        'the_request_cannot_be_rejected_while_the_work_has_been_started_or_request_completed'=>'The request cannot be rejected while the work has been started or request completed',
        'there_is_an_error_try_again'=>'There is an error try again',
        'you_have_already_deleted_this_product_from_your_favourites'=>'you have already deleted this product from your favourites',
        'added_to_favourites'=>'added to favourites',
        'cart_is_empty'=>'cart is empty',
        'the_discount_code_is_incorrect'=>'The discount code is incorrect',
        'cart_added'=>'cart added',
        'cart_has_been_modified'=>'cart has been modified',
        'this_product_has_not_been_added_to_the_cart_or_has_been_removed_from_the_cart'=>'This product has not been added to the cart or has been removed from the cart',
        'this_product_has_been_removed_from_the_cart'=>'This product has been removed from the cart',
        'you_evaluted_technical_successfully'=>'you evaluted technical successfully',
        'your_request_for_technical_has_been_sent_successfully'=>'your request for technical has been sent successfully',
        'there_is_no_main_service_with_this_number'=>'There is no main service with this number',
        'not_registered_try_again'=>'not registered try again',
        'this_account_is_not_activated'=>'This account is not activated',
        'this_account_has_been_banned_by_the_admin_for'=>'This account has been banned by the admin for',
        'attempting_to_sign_up_for_an_admin_account'=>'attempting to sign up for an admin account',
        'the_code_is_incorrect'=>'The code is incorrect',
        'signed_out_successfully'=>'signed out successfully',
        'the_mobile_number_is_incorrect'=>'The mobile number is incorrect',
        'sent_succesfully'=>'sent succesfully',
        'not_sent'=>'not sent',
        'product_added_to_cart'=>'product added to_cart',
        'the_quantity_of_the_product_has_been_modified'=>'The quantity of the product has been modified',
        'you_evaluted_client_successfully'=>'you evaluted client successfully',
        'product_order_has_been_sent_successfully'=>'product order has been sent successfully',
        'you_must_have_already_started'=>'you must have already started',
        'admin_cancel_order' => "تم الغاء الرحلة من قبل الادارة",
        'order_canceled' => "تم الغاء الرحلة",
        'ur_wallet_less_than_budget_plus_addition' => "برجاء شحن المحفظة بمبلغ الرحلة إضافة إلى سعر التفاوض (:min_wallet_order_amount)",
        'wallet_is_soon' => "جاري العمل على الدفع من المحفظة رجاء اختيار طريقة أخرى للدفع حاليا",
        'cant_open_this_chat' => "لايمكن التفاعل على طلب منتهي او تم الغاؤة",
        'cant_found_order' => 'لم يتم العثور على الطلب المراد التفاعل علية ',
        'success_send_reply' => 'تم ارسال الرد للعميل',
        'cant_cancel_order_after_start_trip' => 'لايمكن الغاء طلب بعد بدء الرحلة',
        'cant_finish_order_before_start_trip' => 'لايمكن انهاء طلب قبل بدء الرحلة',
        'success_send_to_drivers' => 'تم عمل الطلب في انتظار تلقي العروض',
        'cant_make_offer_on_cancel_or_finished_orders' => 'لايمكن تقديم عرض على طلبات منتهية أو ملغية',
        'success_subscribe_renewal' => 'تم تجديد الاشتراك بنجاح',
        'success_subscribed' => 'تم الاشتراك بنجاح',
        'the_quantity_more_than_pieces_count_for_product'=>'The total quantity more than pieces count for product',
        'can_not_rate_try_again'=>'can not rate try again',
        'you_already_evaluated_sitter'=>'you already evaluated sitter',
        'you_already_evaluated_client'=>'you already evaluated client',
        'success_subscribed_and_start_after_current_finish' => 'تم الاشتراك بنجاح في الباقة الجديدة سوف يتم العمل بالباقة الجديدة بعد انتهاء الباقة الحالية',
        'expired_your_subscribtion' => 'رجاء تجديد اشتراكك لتتمكن من استقبال طلبات جديدة',
        'admin_not_accept_ur_data' => 'جاري مراجعة بياناتك من قبل الادارة وسوف يتم إبلاغكم حين الانتهاء شكرا لانتظاركم',
        'u_havnt_car' => 'رجاء استكمال بيانات السيارة لتتمكن من استقبال الطلبات',
        'not_subscribed_to_package' => 'رجاء الاشتراك في باقة لتلقي الطلبات',
        'refuse_ur_car_data' => 'لم تتم الموافقة على بياناتكم رجاء التواصل مع الادارة للاطلاع على سبب الرفض',
        'success_withdrawal' => 'تم توصيل طلبك للادارة وسوف يتم التواصل معك في حالة تحويل المبلغ',
        'success_charge' => 'تم شحن محفظتك بنجاح',
        'ur_wallet_lt_amount' => 'رصيدك الحالي غير كافي لعملية السحب',
        'client_select_another_driver' => 'قام العميل باختيار كابتن اخر',
        'u_r_on_default_package_with_subscribed_on_package_and_wallet_lt_default' => 'انت الان على نظام الرحلة الواحدة سعر الرحلة '. (setting('price_of_default_package_order') ?? 1 ) . 'ريال قم بتجديد الباقة لتستمتع بعدد غير محدود من الرحلات اليومية',
        'u_r_on_default_package_with_subscribed_on_package' => $home_msg,
        'u_r_on_default_package' => $home_msg,
        'reach_max_withdrawal_limit' => 'وصلت للحد الاقصي للسحب من التطبيق رجاء شحن المحفظة',
        'success_add_amount_to_ur_wallet' => 'تمت اضافة مبلغ :amount الى محفظتك',
        'please_charge_wallet_to_pay_off' => 'قم بسداد مديونية سلفني لكي تستفيد من الخدمة مرة أخرى!',
        'ur_wallet_balance_not_prmit_use_salfni' => 'رصيد محفظتك لايسمح لك باستخدام خدمة سلفني',
        'plz_charge_wallet_or_update_package' => 'رصيد محفظتك لايكفي لعمل رحلات الباقة الواحدة قم بشحن المحفظة او الاشتراك في احدى باقاتنا المتميزه',
        'no_live_order' => 'لاتوجد طلبات جارية الان',
        'ur_wallet_lt_package_price' => 'رصيد محفظتك غير كاف لاتمام عملية التجديد',
        'request_send_to_admin_will_reply_soon' => 'تم رفع الطلب للادارة وسيتم الرد قريبا شكرا لاستخدامكم تطبيق كيبرز',
        'new_transfer_transaction_title' => 'عمليةتحويل جديدة',
        'new_transfer_transaction_body' => 'قام :from بتحويل مبلغ :amount الى محفظتك',
        'u_have_oldest_request_wait_for_replying' => 'لديك طلب تجديد بالفعل قيد الانتظار سوف يتم الرد على الطلب قريبا',
        'success_transfer_from_ur_wallet_to_another' => 'تم تحويل مبلغ :amount من محفظتك الى :another_user',
        'cant_transfer_to_me' => 'لايمكن تحويل الرصيد الى حسابي الشخصي',
        'client_start_trip_status_title' => 'بدء الرحلة',
        'client_start_trip_status_body' => 'قام :client بالموافقة على بدء الرحلة',
        'success_change_order_status' => 'تم تغيير حالة الطلب',
        'already_have_order' => 'لديك طلب بالفعل لايمكنك عمل طلب جديد ',
        'u_r_use_this_offer' => 'قمت باستخدام هذا العرض مسبقا',
        'ride' => [
            'cant_finish_order_before_start_trip' => 'لايمكن انهاء الطلب قبل استلامه',
            'cant_cancel_order_after_start_trip' => 'لايمكن الغاء طلب بعد استلام الطلب',
            'wait_for_accept_client_start' => 'بانتظار قبول بدء الرحله من العميل',
        ],
        'delivery' => [
            'cant_finish_order_before_start_trip' => 'لايمكن انهاء طلب قبل بدء الرحلة',
            'cant_cancel_order_after_start_trip' => 'لايمكن الغاء طلب بعد بدء الرحلة',
        ],
    ],
    'fcm' => [

             'accept_interview'=>'accept interview',
             'change_interview_status_to_accept'=>'change interview status to accept',
             'accept_interview_body'=>'admin accept on interview',

             'reject_interview'=>'reject interview',
             'change_interview_status_to_reject'=>'change interview status to reject',
             'reject_interview_body'=>'admin reject interview',

             'finish_interview'=>'finish interview',
             'change_interview_status_to_finish'=>'change interview status to finish',
             'finish_interview_body'=>'admin finished interview',

             'accept_sitter'=>'Accept Sitter',
             'change_interview_result_to_accept'=>'change interview result to accept',
             'accept_interview_result_body'=>'admin accept for you,please complete register',

             'reject_sitter'=>'Reject Sitter',
             'change_interview_result_to_reject'=>'change interview result to reject',
             'reject_interview_result_body'=>'admin reject you,you can register later',



        'accept'=>'accept',
        'change_booking_status_to_accept'=>'change booking status to accept',
        'accept_on_booking'=>'accept on booking',


            'cancel_product_order'=>'cancel',
            'change_product_order_status_to_cancel'=>'change product order status',
            'cancel_product_order_body'=>'cancel product order'
        ,
        'reject'=>'reject',
        'change_booking_status_to_reject'=>'change booking status to reject',
        'reject_booking'=>'reject booking',

        'cancel'=>'cancel',
        'change_booking_status_to_cancel'=>'change booking status to cancel',
        'cancel_booking'=>'cancel booking',

        'finish'=>'finish',
        'change_booking_status_to_finish'=>'change booking status to finish',
        'finish_booking'=>'finish booking',


            'finish_product_order'=>'finish',
            'change_product_order_status_to_finish'=>'change product order status',
            'finish_product_order_body'=>'finish product order'
        ,







        'cancel'=>'cancel',
        'change_technical_order_status_to_cancel'=>'change technical order status',
        'cancel_technical_order'=>'cancel technical order ',



            'finish'=>'finish',
            'change_technical_order_status_to_finish'=>'change technical order status',
            'finish_technical_order'=>'finish technical order',




        'evaluate_client_status'=>'evaluate client',
        'evaluate_client_title'=>'evaluate client',
        'sitter_evaluate_client_successfully'=>'sitter evaluate client successfully',


        'evaluate_sitter_status'=>'evaluate client',
        'evaluate_sitter_title'=>'evaluate client',
        'client_evaluate_sitter_successfully'=>'client evaluate sitter successfully',


        'evaluate_technical_status'=>'evaluate technical',
        'evaluate_technical_title'=>'evaluate technical',
        'client_evaluate_technical_successfully'=>'client evaluate technical successfully'

    ],
    'package' => [
        'months' => [
            'one' => 'شهر',
            'two' => 'شهرين',
            'more' => 'أشهر',
        ],
        'package_name' => ":price :currency :duration  :free :commission",
        'free' => ' مجانا',
        'commission' => '(:commission ريال / رحلة)'
    ],
    'statisics'=>[
        'sitters'=>'sitters',
        'incubations'=>'incubations',
        'clients'=>'beneficiaries from childern'
    ],
    'car' => [
        'plate_types' => [
            'taxi' => 'تاكسي',
            'private' => 'خاص',
        ]
    ]
];
