<?php defined('BASEPATH') or exit ('No direct script access allowed');


$config = array(

        'payment' => array(
                array(
                        'field' => 'id',
                          'label' => 'id',
                            'rules' => 'trim|required'
                ),
                array(
                        'field' => 'contribution',
                        'label' => 'contribution',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'amount',
                        'label' => 'amount',
                        'rules' => 'required|trim'
                ),
                array(
                        'field' => 'description',
                        'label' => 'description',
                        'rules' => 'trim'
                ),
                 array(
                        'field' => 'member_type',
                        'label' => 'member_type',
                        'rules' => 'trim'
                )
        ),
        'expense' => array(
                array(
                        'field' => 'id',
                          'label' => 'id',
                            'rules' => 'trim|required'
                ),
                array(
                        'field' => 'amount',
                        'label' => 'amount',
                        'rules' => 'required|trim'
                ),
                array(
                        'field' => 'description',
                        'label' => 'description',
                        'rules' => 'required|trim'
                )
        ),
        'register' => array(
                array(
                        'field' => 'name',
                        'label' => 'name',
                        'rules' => 'required|trim'
                ),
                array(
                        'field' => 'phone',
                        'label' => 'phone',
                        'rules' => 'required|alpha_dash|min_length[9]|max_length[15]'
                        //make required when initial data is done
                ),
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'required|trim|valid_email|callback_email_check'
                ),
                array(
                        'field' => 'gender',
                        'label' => 'gender',
                        'rules' => 'trim|max_length[5]'
                ),
                array(
                        'field' => 'password',
                        'label' => 'password',
                        'rules' => 'trim|max_length[100]'
                ),
                array(
                        'field' => 'yos',
                        'label' => 'yos',
                        'rules' => 'trim|max_length[2]'
                ),
                // array(
                //         'field' => 'date',
                //         'label' => 'date',
                //         'rules' => 'trim|max_length[5]'
                // ),
                array(
                        'field' => 'type',
                        'label' => 'type',
                        'rules' => 'required|trim|max_length[5]'
                )
        ),


         'login' => array(

                array(
                        'field' => 'email',
                        'label' => 'email',
                        'rules' => 'required|trim|valid_email'
                ),
                array(
                        'field' => 'password',
                        'label' => 'password',
                        'rules' => 'required|trim|max_length[100]'
                )
                ),
         'report' => array(

                array(
                        'field' => 'department_id',
                        'label' => 'department_id',
                        'rules' => 'trim'
                ),
                array(
                        'field' => 'member_id',
                        'label' => 'member_id',
                        'rules' => 'trim'
                ),
                array(
                        'field'=>'from',
                        'label'=>'to',
                        'rules'=>'trim|min_length[4]'

                ),
                array(

                        'field'=>'to',
                        'label'=>'to',
                        'rules'=>'trim|min_length[4]'

                    )
                ),

          'wote' => array(
                array(
                        'field' => 'name',
                        'label' => 'name',
                        'rules' => 'trim'
                ),
                array(
                        'field' => 'phone',
                        'label' => 'phone',
                        'rules' => 'alpha_dash|min_length[9]|max_length[15]'
                ),
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'trim|valid_email'
                ),
                array(
                        'field' => 'gender',
                        'label' => 'gender',
                        'rules' => 'trim|max_length[5]'
                ),
                array(
                        'field' => 'password',
                        'label' => 'password',
                        'rules' => 'trim|max_length[100]|xss_clean'
                ),
                array(
                        'field' => 'yos',
                        'label' => 'yos',
                        'rules' => 'trim|max_length[2]'
                ),
                array(
                        'field' => 'action',
                        'label' => 'action',
                        'rules' => 'trim|max_length[5]'
                ),
                array(
                        'field' => 'type',
                        'label' => 'type',
                        'rules' => 'trim|max_length[5]'
                ),
                array(
                        'field' => 'date_of_birth',
                        'label' => 'date_of_birth',
                        'rules' => 'trim|max_length[15]'
                ),
                array(
                        'field' => 'year_of_study',
                        'label' => 'year_of_study',
                        'rules' => 'trim|max_length[5]'
                ),
                array(
                        'field' => 'course',
                        'label' => 'course',
                        'rules' => 'trim|max_length[100]'
                ),
                array(
                        'field' => 'regno',
                        'label' => 'regno',
                        'rules' => 'trim|max_length[20]'
                ),
                array(
                        'field' => 'baptismal_status',
                        'label' => 'baptismal_status',
                        'rules' => 'trim|max_length[5]'
                ),
                array(
                        'field' => 'group',
                        'label' => 'group',
                        'rules' => 'trim|max_length[5]'
                ),
                array(
                        'field' => 'password',
                        'label' => 'password',
                        'rules' => 'trim'
                )
        ),

          'edit' => array(
                array(
                        'field' => 'name',
                        'label' => 'name',
                        'rules' => 'trim'
                ),
                array(
                        'field' => 'phone',
                        'label' => 'phone',
                        'rules' => 'alpha_dash|min_length[9]|max_length[15]'
                        //make required when initial data is done
                ),
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'required|trim|valid_email|callback_email_check1'
                ),
                array(
                        'field' => 'gender',
                        'label' => 'gender',
                        'rules' => 'trim|max_length[5]'
                ),
                array(
                        'field' => 'password',
                        'label' => 'password',
                        'rules' => 'trim|max_length[100]'
                ),
                array(
                        'field' => 'yos',
                        'label' => 'yos',
                        'rules' => 'trim|max_length[2]'
                ),
                array(
                        'field' => 'action',
                        'label' => 'action',
                        'rules' => 'trim|max_length[5]'
                ),
                array(
                        'field' => 'type',
                        'label' => 'type',
                        'rules' => 'trim|max_length[5]'
                ),
                array(
                        'field' => 'date_of_birth',
                        'label' => 'date_of_birth',
                        'rules' => 'trim|max_length[15]'
                ),
                array(
                        'field' => 'year_of_study',
                        'label' => 'year_of_study',
                        'rules' => 'trim|max_length[5]'
                ),
                array(
                        'field' => 'course',
                        'label' => 'course',
                        'rules' => 'trim|max_length[100]'
                ),
                array(
                        'field' => 'regno',
                        'label' => 'regno',
                        'rules' => 'trim|max_length[20]'
                ),
                array(
                        'field' => 'baptismal_status',
                        'label' => 'baptismal_status',
                        'rules' => 'trim|max_length[5]'
                ),
                array(
                        'field' => 'group',
                        'label' => 'group',
                        'rules' => 'trim|max_length[5]'
                ),
                array(
                        'field' => 'password',
                        'label' => 'password',
                        'rules' => 'trim'
                )
        ),
           'event' => array(
                array(
                        'field' => 'day',
                          'label' => 'day',
                            'rules' => 'trim'
                ),

                array(
                        'field' => 'week',
                        'label' => 'week',
                        'rules' => 'trim'
                ),
                array(
                        'field' => 'month',
                        'label' => 'month',
                        'rules' => 'trim'
                ),
                 array(
                        'field' => 'year',
                        'label' => 'year',
                        'rules' => 'trim'
                )
        ),
        'calendar' => array(
                array(
                        'field' => 'title',
                          'label' => 'title',
                            'rules' => 'required|trim'
                ),

                array(
                        'field' => 'start',
                        'label' => 'start',
                        'rules' => 'required|trim'
                ),
                array(
                        'field' => 'stop',
                        'label' => 'stop',
                        'rules' => 'trim'
                ),
                array(
                        'field' => 'description',
                        'label' => 'description',
                        'rules' => 'trim|required'
                ),
                 array(
                        'field' => 'department_id',
                        'label' => 'department_id',
                        'rules' => 'trim'
                )
        ),
        'fcm' => array(

               array(
                       'field' => 'device_id',
                       'label' => 'device_id',
                       'rules' => 'required|trim'
               ),
               array(
                       'field' => 'group_id',
                       'label' => 'group_id',
                       'rules' => 'trim'
               ),
               array(
                       'field' => 'member_id',
                       'label' => 'member_id',
                       'rules' => 'required|trim'
               )
               ),
        'prayer' => array(

               array(
                       'field' => 'prayer',
                       'label' => 'prayer',
                       'rules' => 'trim'
               ),
               array(
                       'field' => 'description',
                       'label' => 'description',
                       'rules' => 'trim'
               ),
               array(
                       'field' => 'member_id',
                       'label' => 'member_id',
                       'rules' => 'required|trim'
               ),
                array(
                       'field' => 'subject',
                       'label' => 'subject',
                       'rules' => 'trim'
               )
               )
);
