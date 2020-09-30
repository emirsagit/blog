<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();

        $setting = [
            [
                'about' => 'Sitemizin kuruluş amacı çocuklarımızın daha mutlu olabilecekleri bir gelecek için öğrendiklerimizi ve deneyimlerimizi elimizden geldiğince siz değerli velilerimizle paylaşmaktır.',  
                'tel' => '+905511623997', 
                'email' => 'site@site.com', 
                'whatsapp' => '+905511623997', 
                'facebook' => 'https://www.facebook.com/',
                'instagram' => 'https://www.instagram.com/', 
                'linkedin' => 'https://www.linkedin.com/', 
                'twitter' => 'https://www.twitter.com/', 
                'github' => 'https://www.github.com/', 
                'homeTitle' => 'Çocuk Psikolojisi ve Kitaplar', 
                'homeSubtitle' => 'Bir gün herkes çocuk oldu.', 
                'contactTitle' => 'İletişim', 
                'contactSubtitle' => 'Aşağıdaki bilgileri kullanarak her zaman bizimle iletişime geçebilirsiniz', 
                'authorTitle' => 'Yazarlarımız', 
                'authorSubtitle' => 'Bilgilerinizi paylaşmak istiyorsanız bizimle iletişime geçin', 
                'categoryTitle' => 'Kategoriler', 
                'categorySubtitle' => '', 
                'homeSeoTitle' => 'Çocuk Psikolojisi ve Kitaplar', 
                'homeSeoDescription' => 'Bir gün herkes çocuktu. Çocuklarımız ve bizi anlatan güncel yaklaşımları sitemizde bulabilirsiniz.', 
                'categorySeoTitle' => 'Çocuğumuz, Kendi Çocukluğumuz ve Kitaplar', 
                'categorySeoDescription' => 'Bir gün herkes çocuktu. Yaşadıklarımız ve yaşayamadıklarımızla çocuklarımızı yetiştiriyoruz. Farkında mıyız?', 
                'contactSeoTitle' => 'Çocuk Psikolojisi ve Kitaplar | İletişim', 
                'contactSeoDescription' => 'Bir gün herkes çocuktu. Bizimle iletişime geçmek için tıklayın.', 
                'authorSeoTitle' => 'Çocuk Psikolojisi ve Kitaplar | Yazarlarımız', 
                'authorSeoDescription' => 'Çocuk Psikolojisi ve güncel çocuk kitapları hakkında uzman yazarlarımız güncel sorunlara çözüm sunuyor',
            ]
        ];
    
        DB::table('settings')->insert($setting);
    }
}
