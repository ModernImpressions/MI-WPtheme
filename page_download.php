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
//set contact url
$contact = get_permalink(get_page_by_path('contact'));
//load composer
require_once __DIR__ . '/vendor/autoload.php';
//load cache
$cacheDir = __DIR__ . '/vendor/browscap/browscap-php/resources';
// check the cache directory for files ending .cache, if there are none run the update script
if (count(glob($cacheDir . "/*.cache")) === 0) {
    // check that the browscap.ini file exists
    if (file_exists($cacheDir . '/browscap.ini')) {
        //run command to update the cache
        $command = 'php ' . __DIR__ . '/vendor/bin/browscap-php browscap:convert';
        $output = shell_exec($command);
        // log the output to php error log
        error_log($output);
    } else {
        // if the browscap.ini file does not exist, log an error to the php error log
        error_log('browscap.ini file does not exist');
        // attempt to download the browscap.ini file
        $command = 'php ' . __DIR__ . '/vendor/bin/browscap-php browscap:fetch';
        $output = shell_exec($command);
        // log the output to php error log
        error_log($output);
        // if the browscap.ini file exists, run the update script
        if (file_exists($cacheDir . '/browscap.ini')) {
            //run command to update the cache
            $command = 'php ' . __DIR__ . '/vendor/bin/browscap-php browscap:convert';
            $output = shell_exec($command);
            // log the output to php error log
            error_log($output);
        } else {
            // if the browscap.ini file does not exist, log an error to the php error log
            error_log('browscap.ini file does not exist and could not be downloaded');
        }
    }
}
// load browscap to detect the browser and OS
$fileCache = new \League\Flysystem\Local\LocalFilesystemAdapter($cacheDir);
$filesystem = new \League\Flysystem\Filesystem($fileCache);
$cache = new \MatthiasMullie\Scrapbook\Psr16\SimpleCache(new \MatthiasMullie\Scrapbook\Adapters\Flysystem($filesystem)); // or maybe any other PSR-16 compatible caches
$logger = new \Monolog\Logger('name'); // or maybe any other PSR-3 compatible logger
$browscap = new \BrowscapPHP\Browscap($cache, $logger);
// Script to detect the browser and OS and provide the correct prompts on where to find the downloaded file.
$agent = $browscap->getBrowser();
// Get the browser name
$browser = $agent->browser;
// Get the OS name
$os = $agent->platform;
// Detect the OS using a regex to find the OS name in the user agent string, it is not perfect and can't possibly detect every OS, but it should work for the most common ones.
if (preg_match('/windows|win/i', $os)) {
    $os = 'Windows';
} elseif (preg_match('/macintosh|mac os x|macOS/i', $os)) {
    $os = 'Mac';
} elseif (preg_match('/linux|ubuntu/i', $os)) {
    $os = 'Linux';
} elseif (preg_match('/unix/i', $os)) {
    $os = 'Unix';
} elseif (preg_match('/iPhone/i', $os)) {
    $os = 'iPhone';
} elseif (preg_match('/iPad/i', $os)) {
    $os = 'iPad';
} elseif (preg_match('/Android/i', $os)) {
    $os = 'Android';
} elseif (preg_match('/CrOS|Chrome OS|Chrome|chromeos/i', $os)) {
    $os = 'Chrome OS';
} else {
    $os = 'Other';
}
// Detect the browser, this uses a regext to find the browser name in the user agent string, it is not perfect and can't possibly detect every browser, but it should work for the most common ones.
if (preg_match('/MSIE/i', $browser) && !preg_match('/Opera/i', $browser)) {
    $browser = 'Internet Explorer';
} elseif (preg_match('/Edge/i', $browser)) {
    $browser = 'Edge';
} elseif (preg_match('/Firefox|fire fox/i', $browser)) {
    $browser = 'Firefox';
} elseif (preg_match('/Chrome/i', $browser)) {
    $browser = 'Chrome';
} elseif (preg_match('/Safari/i', $browser)) {
    $browser = 'Safari';
} elseif (preg_match('/Opera/i', $browser)) {
    $browser = 'Opera';
} elseif (preg_match('/Netscape/i', $browser)) {
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
                        <?php if ($os == 'Windows' || $os == 'Mac') {
                            // on page load complete, execute the downloadTeamViewer() javascript function
                        ?>
                        <script type="text/javascript">
                        function autoDownloadTeamViewer() {
                            var frameId = 'auto-teamviewer';
                            var url = 'https://get.teamviewer.com/<?php echo $teamViewerSlug ?>';
                            var iframe = document.getElementById(frameId);
                            if (iframe != null) {
                                iframe.parentNode.removeChild(iframe)
                            }

                            iframe = document.createElement('iframe');
                            iframe.id = '';
                            iframe.setAttribute('style', 'display:none');
                            iframe.src = url;
                            document.body.appendChild(iframe);
                        }
                        window.addEventListener('DOMContentLoaded', autoDownloadTeamViewer,
                            false); // on page load complete, execute the autoDownloadTeamViewer() javascript function
                        </script>
                        <noscript>
                            <div class="alert alert-danger" role="alert">
                                <p><strong>JavaScript is disabled!</strong> This page requires JavaScript to function
                                    properly.
                                    Please enable JavaScript in your browser settings, if you cannot use JavaScript,
                                    please <a href="https://get.teamviewer.com/<?php echo $teamViewerSlug; ?>"
                                        class="alert-link">click here</a> to download TeamViewer manually.</p>
                            </div>
                        </noscript>
                        <h3>Downloading TeamViewer for <?php echo $os; ?></h3>
                        <p><strong>Done downloading? Next...</strong></p>
                        <?php if ($browser == 'Chrome') { ?>
                        <ol class="download-instructions-list">
                            <li>Your download should appear in the lower left corner of your screen.</li>
                            <li>Click the download to open it.</li>
                            <?php if ($os == 'Windows') { ?>
                            <li>Windows may ask if you want to allow this program to make changes to your computer -
                                Click <strong>Yes.</strong></li>
                            <?php } elseif ($os == 'Mac') { ?>
                            <li>The file may download as a <strong>.Zip</strong> file named TeamViewerQS.zip. If so,
                                opening/running it will create a
                                new folder of the same name.</li>
                            <li>Open the <strong>TeamViewer</strong> application in the folder.</li>
                            <?php } ?>
                            <li>Accept the EULA and DPA.</li>
                            <li>The <strong>Session Code</strong> and other user information will populate
                                automatically.</li>
                            <li>Provide the <strong>Session Code</strong> to the remote technician.</li>
                        </ol>
                        <?php } elseif ($browser == 'Firefox') { ?>
                        <ol class="download-instructions-list">
                            <li>Click the downloads icon in the upper right corner of your browser.</li>
                            <li>Click the download to open it.</li>
                            <?php if ($os == 'Windows') { ?>
                            <li>Windows may ask if you want to allow this program to make changes to your computer -
                                Click <strong>Yes.</strong></li>
                            <?php } elseif ($os == 'Mac') { ?>
                            <li>The file may download as a <strong>.Zip</strong> file named TeamViewerQS.zip. If so,
                                opening/running it will create a
                                new folder of the same name.</li>
                            <li>Open the <strong>TeamViewer</strong> application in the folder.</li>
                            <?php } ?>
                            <li>Accept the EULA and DPA.</li>
                            <li>The <strong>Session Code</strong> and other user information will populate
                                automatically.</li>
                            <li>Provide the <strong>Session Code</strong> to the remote technician.</li>
                        </ol>
                        <?php } elseif ($browser == 'Edge') { ?>
                        <ol class="download-instructions-list">
                            <li>Click the downloads icon in the upper right corner of your browser.</li>
                            <li>Click the download to open it.</li>
                            <?php if ($os == 'Windows') { ?>
                            <li>Windows may ask if you want to allow this program to make changes to your computer -
                                Click <strong>Yes.</strong></li>
                            <?php } elseif ($os == 'Mac') { ?>
                            <li>The file may download as a <strong>.Zip</strong> file named TeamViewerQS.zip. If so,
                                opening/running it will create a
                                new folder of the same name.</li>
                            <li>Open the <strong>TeamViewer</strong> application in the folder.</li>
                            <?php } ?>
                            <li>Accept the EULA and DPA.</li>
                            <li>The <strong>Session Code</strong> and other user information will populate
                                automatically.</li>
                            <li>Provide the <strong>Session Code</strong> to the remote technician.</li>
                        </ol>
                        <?php } elseif ($browser == 'Safari') { ?>
                        <ol class="download-instructions-list">
                            <li>Click the downloads icon in the upper right corner of your browser.</li>
                            <li>Click the download to open it.</li>
                            <?php if ($os == 'Windows') { ?>
                            <li>Windows may ask if you want to allow this program to make changes to your computer -
                                Click <strong>Yes.</strong></li>
                            <?php } elseif ($os == 'Mac') { ?>
                            <li>The file may download as a <strong>.Zip</strong> file named TeamViewerQS.zip. If so,
                                opening/running it will create a
                                new folder of the same name.</li>
                            <li>Open the <strong>TeamViewer</strong> application in the folder.</li>
                            <?php } ?>
                            <li>Accept the EULA and DPA.</li>
                            <li>The <strong>Session Code</strong> and other user information will populate
                                automatically.</li>
                            <li>Provide the <strong>Session Code</strong> to the remote technician.</li>
                        </ol>
                        <?php } elseif ($browser == 'Other') { ?>
                        <ol class="download-instructions-list">
                            <li>Click the download to open it.</li>
                            <?php if ($os == 'Windows') { ?>
                            <li>Windows may ask if you want to allow this program to make changes to your computer -
                                Click <strong>Yes.</strong></li>
                            <?php } elseif ($os == 'Mac') { ?>
                            <li>The file may download as a <strong>.Zip</strong> file named TeamViewerQS.zip. If so,
                                opening/running it will create a
                                new folder of the same name.</li>
                            <li>Open the <strong>TeamViewer</strong> application in the folder.</li>
                            <?php } ?>
                            <li>Accept the EULA and DPA.</li>
                            <li>The <strong>Session Code</strong> and other user information will populate
                                automatically.</li>
                            <li>Provide the <strong>Session Code</strong> to the remote technician.</li>
                        </ol>
                        <hr />
                        <h6>Download failed to start?</h6>
                        <p>If your download does not start automatically after a few seconds, you can click <a
                                href="https://get.teamviewer.com/<?php echo $teamViewerSlug ?>">HERE</a> to be taken to
                            the TeamViewer website for a manual download.</p>
                        <?php } ?>
                        <?php } elseif ($os == 'Linux' || $os == 'Unix') { ?>
                        <!-- Linux/Unix: While TeamViewer technically supports Linux, the installation of quicksupport is not viable for users, so we should direct them to Chrome Remote Desktop if possible. -->
                        <h3>TeamViewer for <?php echo $os; ?> is not available</h3>
                        <p>Sorry, our TeamViewer is not available for <?php echo $os; ?>, however we may still be able
                            to
                            assist you with <a href="https://remotedesktop.google.com/">Chrome Remote Desktop</a>.</p>
                        <?php } elseif ($os == 'iPhone' || $os == 'iPad' || $os == 'Android') { ?>
                        <h3>TeamViewer for <?php echo $os; ?> is not available</h3>
                        <p>Sorry, our TeamViewer is not available for <?php echo $os; ?>, and we cannot remote into this
                            device.</p>
                        <p>We may be able to verbally guide you on your issue with your device, ask your support
                            technician.</p>
                        <?php } elseif ($os == 'Chrome OS') { ?>
                        <script type="text/javascript">
                        function noTeamViewer() {
                            // We don't have a TeamViewer for Chrome OS, well show a message and redirect to Chrome Remote Desktop instead.
                            var r = confirm(
                                "Sorry, our TeamViewer is not available for Chrome OS. You can try to use Chrome Remote Desktop instead."
                            );
                            if (r == true) {
                                window.location.href = "https://remotedesktop.google.com/";
                            }
                        }
                        </script>
                        <noscript>
                            <div class="alert alert-danger" role="alert">
                                <p><strong>JavaScript is disabled!</strong> This page requires JavaScript to function
                                    properly.
                                    Please enable JavaScript in your browser settings.</p>
                            </div>
                        </noscript>
                        <h3>TeamViewer for <?php echo $os; ?> is not available</h3>
                        <p>Sorry, our TeamViewer is not available for <?php echo $os; ?>. You can try to use Chrome
                            Remote
                            Desktop instead.</p>
                        <ol class="download-instructions-list">
                            <li>Open the <a href="<?php echo $download; ?>">Chrome Remote Desktop</a>
                                page.</li>
                            <li>Click <strong>Start</strong>.</li>
                            <li>Click <strong>Allow</strong> to allow Chrome Remote Desktop to access your computer.
                            </li>
                        </ol>
                        <?php } elseif ($os == 'Other') { ?>
                        <h3>Alternative Downloads</h3>
                        <p>Sorry, we were unable to detect your operating system. You can try one of the manual options
                            below.</p>
                        <?php } ?>
                        <br />
                        <hr />
                        <br />
                        <div>
                            <h5>Did we get it wrong?</h5>
                            <p>If you think we detected the wrong device type or browser, please <a
                                    href="<?php echo $contact; ?>">contact us</a> and let us
                                know.</p>
                            <p>We support TeamViewer and Chrome Remote Desktop, you can try one of them manually below.
                            </p>
                            <h6>Manual Downloads</h6>
                            <p>If your download didn't start or you need to manually download, click one of the options
                                below.</p>
                            <ul>
                                <li><?php if ($os == 'Chrome OS') { ?>
                                    <a onclick="noTeamViewer()">TeamViewer</a>
                                    <?php } elseif ($os == 'Other') { ?>Visit the <a
                                        href="https://get.teamviewer.com/<?php echo $teamViewerSlug ?>">TeamViewer</a>
                                    page to see if your device supports the
                                    program.<?php } elseif ($os == 'Windows' || $os == 'Mac') { ?><a
                                        onclick="downloadTeamViewer()">TeamViewer</a><?php } ?> *Windows/Mac Support
                                </li>
                                <li><a href="https://remotedesktop.google.com/">Chrome Remote Desktop</a>
                                    *ChromeOS/Windows/Mac/Linux</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer Bottom area
    ================================================== -->
<?php get_footer('support'); ?>
