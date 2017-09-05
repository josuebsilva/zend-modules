Welcome to the zend-modules wiki!
# FirebaseMessaging
### First add Zend module in your project

    use FirebaseMessaging\Http\FirebaseMessaging;

    $firebaseMessaging = new FirebaseMessaging();

    $firebaseMessaging->setKey(YOUR_KEY);

    $registration_ids[] = [
       "DEMO.&sjdfjdksjkdfdskjfjhjhjHJhsdnfj67basd",
    ];

    $data = [
        "message" => "Hello, how are you?",
    ];

    $response = $firebaseMessaging->send($data, $registration_ids);
