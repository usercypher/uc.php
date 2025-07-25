<?php

$app = $data['app'];
$code = $data['code'];
$error = $data['error'];

$httpMap = array(
    400 => array('Bad Request', '400', 'The request could not be processed. Please verify the URL or parameters.'),
    401 => array('Unauthorized', '401', 'Authentication is required to access this resource.'),
    403 => array('Forbidden', '403', 'You do not have permission to access this resource.'),
    404 => array('Not Found', '404', 'The requested page could not be found.'),
    405 => array('Method Not Allowed', '405', 'The HTTP method used is not allowed for this resource.'),
    414 => array('Request-URI Too Long', '414', 'The URI provided in the request is too long. Please shorten the URL and try again.'),
    422 => array('Unprocessable Entity', '422', 'The request was well-formed but could not be followed due to semantic errors.'),
    500 => array('Internal Server Error', '500', 'An unexpected error occurred. Please try again later.')
);

list($head_title, $title, $description) = isset($httpMap[$code]) ? $httpMap[$code] : $httpMap[500];

?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $head_title; ?></title>
    <style>
        * {box-sizing: border-box;}
        html {font-size: 16px;}
        body {font-family: Arial, sans-serif; padding: 0; margin: 0;}
        div {word-wrap: break-word; padding: 3em; text-align: center;}
        h1 {font-size: 4em; color: #e74c3c; font-weight: 900;}
        p {font-size: 1em; line-height: 1.6;}
        a {color: #3498db; text-decoration: none;}
        a:hover {text-decoration: underline;}
        pre {white-space: pre; overflow-x: auto; text-align: left;}
    </style>
</head>
<body>
    <div>
        <h1><?php echo $title; ?></h1>
        <p><?php echo $description; ?> <a href="<?php echo $app->urlRoute(''); ?>">GO BACK</a></p>
        <pre><?php echo $app->getEnv('SHOW_ERRORS') ? htmlspecialchars($error) : ''; ?></pre>
    </div>
</body>
</html>