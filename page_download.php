<?php

/**
 *Template Name: Remote Support Download Page
 * @package WordPress
 * @subpackage MI-theme
 * @author Patrick Barnhardt
 *
 * This is the template for the Remote Support Download Page, this page is used to download the remote support software and should detect the browser and OS and provide the correct prompts on where to find the downloaded file.
 */

// Script to detect the browser and OS and provide the correct prompts on where to find the downloaded file.
$browser = $_SERVER['HTTP_USER_AGENT'];
$os = $_SERVER['HTTP_USER_AGENT'];
if (preg_match('/Firefox/i', $browser)) {
    $browser = 'Firefox';
} elseif (preg_match('/Chrome/i', $browser)) {
    $browser = 'Chrome';
} elseif (preg_match('/Safari/i', $browser)) {
    $browser = 'Safari';
} else {
    $browser = 'Other';
}

if (preg_match('/Windows/i', $os)) {
    $os = 'Windows';
} elseif (preg_match('/Macintosh/i', $os)) {
    $os = 'Mac';
} elseif (preg_match('/Linux/i', $os)) {
    $os = 'Linux';
} elseif (preg_match('/Unix/i', $os)) {
    $os = 'Unix';
} elseif (preg_match('/iPhone/i', $os)) {
    $os = 'iPhone';
} elseif (preg_match('/iPad/i', $os)) {
    $os = 'iPad';
} elseif (preg_match('/Android/i', $os)) {
    $os = 'Android';
} elseif (preg_match('/CrOS/i', $os)) {
    $os = 'Chrome OS';
} else {
    $os = 'Other';
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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer Bottom area
    ================================================== -->
<?php get_footer('support'); ?>
