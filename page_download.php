<?php

/**
 *Template Name: Remote Support Download Page
 * @package WordPress
 * @subpackage MI-theme
 * @author Patrick Barnhardt
 *
 * This is the template for the Remote Support Download Page, this page is used to download the remote support software and should detect the browser and OS and provide the correct prompts on where to find the downloaded file.
 */
define('DONOTCACHEPAGE', true);
//load composer
require_once __DIR__ . '/vendor/autoload.php';
//load cache
$cacheDir = __DIR__ . '/vendor/BrowscapPHP/resources/';
// load browscap
$fileCache = new \League\Flysystem\Local\LocalFilesystemAdapter($cacheDir);
$filesystem = new \League\Flysystem\Filesystem($fileCache);
$cache = new \MatthiasMullie\Scrapbook\Psr16\SimpleCache(new \MatthiasMullie\Scrapbook\Adapters\Flysystem($filesystem)); // or maybe any other PSR-16 compatible caches
$logger = new \Monolog\Logger('name'); // or maybe any other PSR-3 compatible logger
$browscap = new \BrowscapPHP\Browscap($cache, $logger);
// Script to detect the browser and OS and provide the correct prompts on where to find the downloaded file.
// Put user agent string into $browser variable
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$agent = $browscap->getBrowser();
// Get the browser name
$browser = $agent->browser;
// Get the OS name
$os = $agent->platform;
// Detect the OS
if (preg_match('/windows|win/i', $os)) {
    $os = 'Windows';
} elseif (preg_match('/macintosh|mac os x/i', $os)) {
    $os = 'Mac';
} elseif (preg_match('/linux/i', $os)) {
    $os = 'Linux';
} elseif (preg_match('/unix/i', $os)) {
    $os = 'Unix';
} elseif (preg_match('/iPhone/i', $os)) {
    $os = 'iPhone';
} elseif (preg_match('/iPad/i', $os)) {
    $os = 'iPad';
} elseif (preg_match('/Android/i', $os)) {
    $os = 'Android';
} elseif (preg_match('/CrOS|Chrome OS/i', $os)) {
    $os = 'Chrome OS';
} else {
    $os = 'Other';
}
// Detect the browser
if (preg_match('/MSIE/i', $userAgent) && !preg_match('/Opera/i', $userAgent)) {
    $browser = 'Internet Explorer';
} elseif (preg_match('/Firefox/i', $userAgent)) {
    $browser = 'Firefox';
} elseif (preg_match('/Chrome/i', $userAgent)) {
    $browser = 'Chrome';
} elseif (preg_match('/Safari/i', $userAgent)) {
    $browser = 'Safari';
} elseif (preg_match('/Opera/i', $userAgent)) {
    $browser = 'Opera';
} elseif (preg_match('/Netscape/i', $userAgent)) {
    $browser = 'Netscape';
} else {
    $browser = 'Other';
}
// End of script to detect the browser and OS and provide the correct prompts on where to find the downloaded file.
// Depending on the OS, the download will either be for TeamViewer or Chrome Remote Desktop
$teamViewerSlug = get_option('tv_customBuildTag');
if ($os == 'Windows' || $os == 'Mac') {
    $download = 'https://get.teamviewer.com/' . $teamViewerSlug;
} elseif ($os == 'Linux' || $os == 'Unix' || $os == 'Chrome OS') {
    $download = 'https://remotedesktop.google.com/';
} elseif ($os == 'iPhone' || $os == 'iPad' || $os == 'Android') {
    $download = null;
} else {
    $download = 'unknown';
}

get_header('support'); ?>

<!-- Content Area
    ================================================== -->
<div id="full_page_area">
    <div class="inner_full_page_thumb">
        <?php echo the_post_thumbnail(); ?>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="original_content_area">
                    <h2 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    <div class="content">
                        <?php if ($os == 'Windows' || $os == 'Mac') { ?>
                            <h3>Downloading TeamViewer for <?php echo $os; ?></h3>
                            <p><strong>Done downloading? Next...</strong></p>
                            <?php if ($browser == 'Chrome') { ?>
                                <ol>
                                    <li>Your download should appear in the lower left corner of your screen.</li>
                                    <li>Click the download to open it.</li>
                                    <?php if ($os == 'Windows') { ?>
                                        <li>Windows may ask if you want to allow this program to make changes to your computer -
                                            Click <strong>Yes.</strong></li>
                                    <?php } elseif ($os == 'Mac') { ?>
                                        <li>The file may download as a <strong>.Zip</strong> file. If so, running it will create a
                                            new folder of the same name.</li>
                                        <li>Open the <strong>TeamViewer</strong> application in the folder.</li>
                                    <?php } ?>
                                    <li>Accept the EULA and DPA.</li>
                                    <li>The <strong>Session Code</strong> and other user information will populate
                                        automatically.</li>
                                    <li>Provide the <strong>Session Code</strong> to the remote technician.</li>
                                </ol>
                            <?php } elseif ($browser == 'Firefox') { ?>
                                <ol>
                                    <li>Click the downloads icon in the upper right corner of your browser.</li>
                                    <li>Click the download to open it.</li>
                                    <?php if ($os == 'Windows') { ?>
                                        <li>Windows may ask if you want to allow this program to make changes to your computer -
                                            Click <strong>Yes.</strong></li>
                                    <?php } elseif ($os == 'Mac') { ?>
                                        <li>The file may download as a <strong>.Zip</strong> file. If so, running it will create a
                                            new folder of the same name.</li>
                                        <li>Open the <strong>TeamViewer</strong> application in the folder.</li>
                                    <?php } ?>
                                    <li>Accept the EULA and DPA.</li>
                                    <li>The <strong>Session Code</strong> and other user information will populate
                                        automatically.</li>
                                    <li>Provide the <strong>Session Code</strong> to the remote technician.</li>
                                </ol>
                            <?php } elseif ($browser == 'Safari') { ?>
                                <ol>
                                    <li>Click the downloads icon in the upper right corner of your browser.</li>
                                    <li>Click the download to open it.</li>
                                    <?php if ($os == 'Windows') { ?>
                                        <li>Windows may ask if you want to allow this program to make changes to your computer -
                                            Click <strong>Yes.</strong></li>
                                    <?php } elseif ($os == 'Mac') { ?>
                                        <li>The file may download as a <strong>.Zip</strong> file. If so, running it will create a
                                            new folder of the same name.</li>
                                        <li>Open the <strong>TeamViewer</strong> application in the folder.</li>
                                    <?php } ?>
                                    <li>Accept the EULA and DPA.</li>
                                    <li>The <strong>Session Code</strong> and other user information will populate
                                        automatically.</li>
                                    <li>Provide the <strong>Session Code</strong> to the remote technician.</li>
                                </ol>
                            <?php } elseif ($browser == 'Other') { ?>
                                <ol>
                                    <li>Click the download to open it.</li>
                                    <?php if ($os == 'Windows') { ?>
                                        <li>Windows may ask if you want to allow this program to make changes to your computer -
                                            Click <strong>Yes.</strong></li>
                                    <?php } elseif ($os == 'Mac') { ?>
                                        <li>The file may download as a <strong>.Zip</strong> file. If so, running it will create a
                                            new folder of the same name.</li>
                                        <li>Open the <strong>TeamViewer</strong> application in the folder.</li>
                                    <?php } ?>
                                    <li>Accept the EULA and DPA.</li>
                                    <li>The <strong>Session Code</strong> and other user information will populate
                                        automatically.</li>
                                    <li>Provide the <strong>Session Code</strong> to the remote technician.</li>
                                </ol>
                            <?php } ?>
                        <?php } elseif ($os == 'Linux' || $os == 'Unix') { ?>

                        <?php } elseif ($os == 'iPhone' || $os == 'iPad' || $os == 'Android') { ?>

                        <?php } elseif ($os == 'Chrome OS') { ?>

                        <?php } elseif ($os == 'Other') { ?>

                        <?php } ?>
                    </div>
                    <p><?php //for debugging the HTTP_USER_AGENT
                        echo $_SERVER['HTTP_USER_AGENT']; ?></p>
                    <p><?php //print or echo the $agent object
                        print_r($agent);
                        ?></p>
                    </p>
                    <p><?php printf($browser); ?></p>
                    <p><?php printf($os); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer Bottom area
    ================================================== -->
<?php get_footer('support'); ?>
