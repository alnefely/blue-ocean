<?php


function langDir($key='ar')
{
    $langs = SupportedLangs();
    switch ($langs[$key]['script']) {
        case 'Arab':
        case 'Hebr':
        case 'Mong':
        case 'Tfng':
        case 'Thaa':
        return 'rtl';
        default:
        return 'ltr';
    }
}

function AppLang()
{
    return \LaravelLocalization::getCurrentLocale();
}

// App Dir
function AppDir()
{
    return (AppLang() == 'ar')? 'rtl' : 'ltr';
}


function SupportedLangs()
{
    return \LaravelLocalization::getSupportedLocales();
}

function SupportedKeys()
{
    return \LaravelLocalization::getSupportedLanguagesKeys();
}

function LangNative($key)
{
    $langs = SupportedLangs();
    return $langs[$key]['native'];
}



//////////////////////////////////////////////

// Send Custom Email
function sendEmail($to, $subject, $markdownView, $data)
{
    \Illuminate\Support\Facades\Mail::to($to)
    ->send(new App\Mail\CustomMail($subject, $markdownView, $data));
}

function extractZipFile($zipFilePath, $extractPath)
{
    $zip = new ZipArchive;
    if ($zip->open($zipFilePath) === TRUE):
        if (!file_exists($extractPath)):
            mkdir($extractPath, 0777, true);
        endif;
        for ($i = 0; $i < $zip->numFiles; $i++):
            $entry = $zip->getNameIndex($i);
            $zip->extractTo($extractPath, $entry);
        endfor;
        $zip->close();
    endif;
    return true;
}

function randomString($limit=10)
{
    return \Illuminate\Support\Str::random($limit);
}

function FormatDate($date)
{
    return \Carbon\Carbon::createFromTimestamp(strtotime($date))->format('Y-m-d h:i A');
}

function formatSizeUnits($path)
{
    $bytes = sprintf('%u', filesize($path));

    if ($bytes > 0){
        $unit = intval(log($bytes, 1024));
        $units = array('B', 'KB', 'MB', 'GB');

        if (array_key_exists($unit, $units) === true)
        {
            return sprintf('%d %s', $bytes / pow(1024, $unit), $units[$unit]);
        }
    }
    return $bytes;
}


function set_timezone($timezone='Africa/Cairo')
{
    $path = base_path('.env');
    $data = file_get_contents($path);
    $NewTimeZone = 'APP_TIMEZONE='.config('app.timezone');
    if (str_contains($data, $NewTimeZone)):
        file_put_contents($path, str_replace($NewTimeZone, "APP_TIMEZONE=$timezone",$data) );
    else:
        file_put_contents($path, $data.PHP_EOL.'APP_TIMEZONE='.$timezone);
    endif;
    return true;
}

function set_Mail_Smtp($MAIL_MAILER,$MAIL_HOST,$MAIL_PORT,$MAIL_USERNAME,$MAIL_PASSWORD,$MAIL_ENCRYPTION,$MAIL_FROM_ADDRESS,$MAIL_FROM_NAME)
{
    $path = base_path('.env');
    $data = file_get_contents($path);
    file_put_contents($path, str_replace('MAIL_MAILER='.env('MAIL_MAILER'), "MAIL_MAILER=$MAIL_MAILER",$data) );
    $data = file_get_contents($path);
    file_put_contents($path, str_replace('MAIL_HOST='.env('MAIL_HOST'), "MAIL_HOST=$MAIL_HOST",$data) );
    $data = file_get_contents($path);
    file_put_contents($path, str_replace('MAIL_PORT='.env('MAIL_PORT'), "MAIL_PORT=$MAIL_PORT",$data) );
    $data = file_get_contents($path);
    file_put_contents($path, str_replace('MAIL_USERNAME='.env('MAIL_USERNAME'), "MAIL_USERNAME=$MAIL_USERNAME",$data) );
    $data = file_get_contents($path);
    file_put_contents($path, str_replace('MAIL_PASSWORD='.env('MAIL_PASSWORD'), "MAIL_PASSWORD=$MAIL_PASSWORD",$data) );
    $data = file_get_contents($path);
    file_put_contents($path, str_replace('MAIL_ENCRYPTION='.env('MAIL_ENCRYPTION'), "MAIL_ENCRYPTION=$MAIL_ENCRYPTION",$data) );
    $data = file_get_contents($path);
    file_put_contents($path, str_replace('MAIL_FROM_ADDRESS='.env('MAIL_FROM_ADDRESS'), "MAIL_FROM_ADDRESS=$MAIL_FROM_ADDRESS",$data) );
    $data = file_get_contents($path);
    file_put_contents($path, str_replace('MAIL_FROM_NAME='.env('MAIL_FROM_NAME'), "MAIL_FROM_NAME=$MAIL_FROM_NAME",$data) );
    return true;
}
