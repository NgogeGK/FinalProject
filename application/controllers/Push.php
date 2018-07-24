<?php
  require('Pusher.php');

  $options = array(
    'encrypted' => true
  );
  $pusher = new Pusher(
    '6623b0bb82b68a6c26b4',
    'bcdc5b35ebc7e3c5ced9',
    '218814',
    $options
  );

  $data['message'] = 'hello world';
  $pusher->trigger('test_channel', 'my_event', $data);
?>