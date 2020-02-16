@php

   $arr = collect([
   /*
   Note:
   'Do not change this' => 'Changeable',*/

        'consumer' =>[
            'customer' => 'View Customer List',
            'distributor' => 'View Distributor List',
            'salesman' => 'View Salesman List',
            'customer-points' => 'View Point Reports',
            'customer-commission' => 'View Commission Reports',
            'customer-save' => 'Create new Consumer',
            'consumer-ref-edit' => 'Edit Reference',
            'consumer-profile-edit' => 'Edit Consumer Profile'
        ],

        'redemption' =>[
            'redemption' => 'View Redemption List',
            'redemption-save' => 'Create Redemption List',
            'redemption-edit' => 'Edit Redemption List',
            'redemption-del' => 'Delete Redemption List',
            'redemption-list' => 'View Redemption Products',
            'redemption-list-save' => 'Create Redemption Products',
            'redemption-list-edit' => 'Edit Redemption Products',
            'redemption-list-del' => 'Delete Redemption Products'
        ],

        'order' =>[
            'orders' => 'View All Order List',
            'complete' => 'View Complete Order List',
            'paid' => 'View Paid Order List',
            'process' => 'View Order Processing',
            'shipped' => 'View Order Shipped',
            'cancel' => 'View Cancel Order List',
            'orders-report' => 'Generate Order Report',
            'order-show' => 'Single Order View',
            'order-status' => 'Change Order Status',
            'order-del' => 'Delete Order',
            'track-update' => 'Order Shipped',
            'order-cancel' => 'Cancel Order',
            'orders-mark' => 'Change Status By Marking'
        ],

        'advertise' =>[
            'advertise' => 'View Advertise',
            'advertise-save' => 'Advertise Save',
            'advertise-edit' => 'Advertise Edit',
            'advertise-del' => 'Advertise Delete',
            'advertise-active' => 'Change Advertise Status'
        ],

        'chat' =>[
            'adchat' => 'View Chat Request',
            'adchat-start' => 'View New Chat Info',
            'chat-messaging' => 'Start Chat',
            'adchat-history' => 'View Chat History',
            'adchat-end' => 'Chat End',
            'adchat-del' => 'Delete Chat'
        ],

        'role' =>[
            'role' => 'View user role',
            'role-save' => 'Create User Role',
            'role-edit' => 'Edit User Role',
            'role-del' => 'Delete User Role',
            'role-permission' => 'View Role Permission',
            'update-permission' => 'Set Role Permission'
        ],

        'product' =>[
            'product' => 'Product List',
            'product-save' => 'Create Product',
            'product-edit' => 'Edit Product',
            'product-del' => 'Delete Product'
        ],


        'Promotional' =>[
            'promotional' => 'Promotional Offer List',
            'promotional-save' => 'Create Promotional Offer',
            'promotional-edit' => 'Edit Promotional Offer',
            'promotional-del' => 'Delete Promotional Offer'
        ],


        'user' =>[
            'user' => 'View User List',
            'users-save' => 'Create User',
            'users-edit' => 'Edit User',
            'users-del' => 'Delete User'
        ],

        'shipping' =>[
            'rate' => 'View Shipping Rate Register',
            'rate-save' => 'Add Shipping Rate',
            'rate-edit' => 'Edit Shipping Rate',
            'rate-del' => 'Delete Shipping Rate',

            'carrier' => 'View Shipping Carrier',
            'carrier-save' => 'Add Shipping Carrier',
            'carrier-edit' => 'Edit Shipping Carrier',
            'carrier-del' => 'Delete Shipping Carrier',

            'location' => 'View Shipping Location',
            'location-save' => 'Add Shipping Location',
            'location-edit' => 'Edit Shipping Location',
            'location-del' => 'Delete Shipping Location',
        ],


        'website' =>[
            'dashboard' => 'Access to Admin Dashboard',
            'webpage' => 'Access to website content',
            'page-about' => 'Edit about us',
            'page-contact' => 'Edit contact info',
            'page-bank' => 'Edit bank info',

            'banner' => 'Access to show banner',
            'banner-save' => 'Update banner',
        ]
    ]);

@endphp
<input type="hidden" name="id" value="{{$id}}">
<div class="row">
    @foreach($arr as $k => $values)
        <div class="col-md-4">
            <h5 class="mb-0">{{ucwords($k)}}</h5>
            <ul style="padding: 0px;">
                @foreach($values as $key => $per)
                    <li style="list-style: none;">
                        <label class="checkbox-inline">
                            <input name="permission[{{$key}}]" value="{{$per}}" type="checkbox" {{check_box($id, $key)}}>
                            {{$per}}
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
