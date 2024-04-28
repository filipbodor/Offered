<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdvertisementsTableSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        if ($users->isEmpty()) {
            echo "No users found. Please seed users before running this seeder.\n";
            return;
        }

        $adsContent = [
            'Remeslá' => [
                'Maliarske práce' => [
                    [
                        'title' => 'Kompletné maliarske služby',
                        'description' => 'Ponúkame profesionálne maliarske práce pre interiéry a exteriéry. Využite naše služby pre oživenie vášho domova či kancelárie.'
                    ],
                    [
                        'title' => 'Maliarske a dekoratívne práce na mieru',
                        'description' => 'Špecializujeme sa na dekoratívne maliarske techniky pre unikátne interiérové riešenia. Dajte svojmu priestoru osobitý charakter.'
                    ],
                    [
                        'title' => 'Profesionálne maľovanie exteriérov',
                        'description' => 'Špecializujeme sa na maľovanie exteriérov domov a bytových domov. Poskytujeme odolné a dlhotrvajúce povrchové úpravy, odolné voči poveternostným vplyvom a UV žiareniu. Zdarma vykonávame aj predbežnú kontrolu stavu fasád.'
                    ],
                    [
                        'title' => 'Dekoratívne maľovanie a techniky',
                        'description' => 'Objavte krásu dekoratívneho maľovania! Ponúkame širokú paletu špeciálnych techník vrátane štukovania, venecianskeho štuku a maľby s efektom mramoru. Pracujeme s prémiovými materiálmi pre dosiahnutie jedinečného vzhľadu vašich stien.'
                    ],
                    [
                        'title' => 'Maľovanie kancelárskych priestorov a komerčných objektov',
                        'description' => 'Naše služby zahŕňajú profesionálne maľovanie a údržbu všetkých typov komerčných priestorov. Ponúkame flexibilné časovanie práce mimo pracovných hodín alebo cez víkendy, aby sme minimalizovali prerušenie vášho podnikania.'
                    ],
                    [
                        'title' => 'Maľovanie na mieru podľa individuálnych požiadaviek',
                        'description' => 'Realizujeme maľovacie projekty prispôsobené vašim špecifickým potrebám a želaniam. Či už ide o unikátne farebné schémy, kombináciu rôznych techník alebo aplikáciu tematických murálov, naši odborníci vám pomôžu premeniť vaše predstavy na realitu.'
                    ]
                ],
                'Stavebné práce' => [
                    [
                        'title' => 'Komplexné stavebné a rekonštrukčné práce',
                        'description' => 'Ponúkame široké spektrum stavebných služieb od základov po strechu. Naše služby zahŕňajú novostavby, prístavby, rekonštrukcie a sanácie budov. Zabezpečujeme kvalitnú prácu v dohodnutých termínoch.'
                    ],
                    [
                        'title' => 'Profesionálne murárske práce',
                        'description' => 'Špecializujeme sa na všetky druhy murárskych prác. Ponúkame vysokú kvalitu, rýchlosť a spoľahlivosť pri realizácii vašich projektov, či už ide o nové steny, priečky alebo kompletne nové konštrukcie.'
                    ],
                    [
                        'title' => 'Zatepľovanie budov a fasád',
                        'description' => 'Poskytujeme komplexné služby v oblasti zatepľovania objektov. Zvýšte energetickú efektivitu svojej budovy a zároveň jej dodajte nový estetický vzhľad. Pracujeme s modernými materiálmi a technológiami.'
                    ],
                    [
                        'title' => 'Výkopové a zemné práce',
                        'description' => 'Realizujeme všetky typy výkopových a zemných prác pre súkromné aj komerčné projekty. Ponúkame prípravu terénu, zakladanie stavieb, terénne úpravy a odborné poradenstvo.'
                    ],
                    [
                        'title' => 'Inštalácia vodovodných a kanalizačných systémov',
                        'description' => 'Naša firma poskytuje služby v oblasti inštalácie a rekonštrukcie vodovodných, kanalizačných a vykurovacích systémov. Zabezpečujeme spoľahlivé a dlhodobé riešenia pre váš domov alebo komerčný priestor.'
                    ]
                ],
                'Elektrikárske práce' => [
                    [
                        'title' => 'Profesionálne elektrikárske služby',
                        'description' => 'Sme vaši spoľahliví partneri pre elektrikárske práce. Ponúkame inštaláciu, opravy a údržbu elektrických systémov pre domácnosti a komerčné objekty. Vaša elektrická bezpečnosť je naším cieľom.'
                    ],
                    [
                        'title' => 'Elektrické inštalácie a modernizácie',
                        'description' => 'Modernizujeme a inštalujeme elektrické systémy, aby boli efektívnejšie a spoľahlivejšie. Poskytujeme riešenia pre energetickú úsporu a technologický pokrok vo vašom domove alebo firme.'
                    ],
                    [
                        'title' => 'Riešenia pre osvetlenie a automatizáciu',
                        'description' => 'Zabezpečíme vaše osvetlenie a automatizáciu domova. Ponúkame inteligentné osvetlenie, riadenie spotrebičov a nastavenie inteligentných zariadení pre komfort a bezpečnosť.'
                    ],
                    [
                        'title' => 'Núdzový elektrikár kedykoľvek',
                        'description' => 'Naši elektrikári sú k dispozícii 24/7 pre riešenie elektrických problémov. Ak máte núdzovú situáciu, volajte nám a my prídeme čo najrýchlejšie, aby sme vám pomohli.'
                    ],
                    [
                        'title' => 'Osvedčené elektrické opravy',
                        'description' => 'Máte problémy so stávajúcimi elektrickými systémami? Naši odborníci poskytujú spoľahlivé a osvedčené opravy elektrických porúch. Vaša bezpečnosť je na prvom mieste.'
                    ],
                ],
                'Truhlárske práce' => [
                    [
                        'title' => 'Rýchle a presné výroby nábytku',
                        'description' => 'Naši truhlári majú povesť rýchlych a precíznych remeselníkov. Ak potrebujete nový nábytok na mieru, kontaktujte nás a získajte jedinečné dielo pre svoj domov.'
                    ],
                    [
                        'title' => 'Restaurácia starých drevených kusov',
                        'description' => 'Máte starý nábytok alebo drevené kusy, ktoré chcete obnoviť? Naši truhlári sa špecializujú na restauráciu a obnovu drevených artefaktov a starožitností.'
                    ],
                    [
                        'title' => 'Kvalitné truhlárske práce na mieru',
                        'description' => 'Naši truhlári majú bohaté skúsenosti v tvorbe nábytku a interiérových riešení na mieru. Vyrobíme pre vás unikátne kusy nábytku, drevené obklady a ďalšie truhlárske diela.'
                    ],
                    [
                        'title' => 'Rekonštrukcia a úpravy drevených konštrukcií',
                        'description' => 'Ak potrebujete rekonštruovať drevené časti vášho domu alebo bytu, sme tu pre vás. Poskytujeme renovácie drevených podláh, schodísk, dverí a okien.'
                    ],
                    [
                        'title' => 'Návrh a výroba kuchynských linkov',
                        'description' => 'Vytvoríme pre vás moderné a funkčné kuchynské linky na mieru. Naši truhlári vás prevedú procesom návrhu a výroby, aby vaša kuchyňa bola presne taká, akú ste si predstavovali.'
                    ],
                ],
                'Inštalatérske práce' => [
                    [
                        'title' => 'Profesionálne opravy a inštalácie vodovodov',
                        'description' => 'Naši inštalatéri sú odborníci na opravy a inštalácie vodovodov pre domácnosti a komerčné objekty. Rýchlo a spoľahlivo riešime problémy s vodnými rúrami, batériami a splachovacími zariadeniami.'
                    ],
                    [
                        'title' => 'Odstránenie zápaliek a upchatých odtokov',
                        'description' => 'Máte problémy s upchatými odtokmi alebo kanalizáciou? Naši inštalatéri vyriešia všetky problémy s odvodňovaním a upchávaním, aby ste mali čisté a fungujúce odtoky.'
                    ],
                    [
                        'title' => 'Inštalácia moderných sanitárnych zariadení',
                        'description' => 'Modernizujeme váš kúpeľ alebo kuchyňu inštaláciou nových sanitárnych zariadení. Ponúkame výber z najnovších modelov batérií, umývadiel a sprchových kútov.'
                    ],
                    [
                        'title' => 'Riešenia pre úsporu vody a energie',
                        'description' => 'Sme zameraní na poskytovanie ekologických riešení pre úsporu vody a energie. Navrhujeme a inštalujeme ekonomické vodovodné systémy a ohrievače vody.'
                    ],
                    [
                        'title' => 'Núdzové inštalatérske služby 24/7',
                        'description' => 'Naši inštalatéri sú k dispozícii 24 hodín denne pre riešenie núdzových situácií. Ak máte poruchu vodovodného systému, volajte nám a my prídeme ihneď.'
                    ],
                ],
                'Kováčske a zámočnícke práce' => [
                    [
                        'title' => 'Ručne kované kovové produkty',
                        'description' => 'Vytvárame jedinečné a krásne produkty z kovaného železa. Naši kováči majú umenie vytvoriť rôzne kovové kúsky, vrátane brán, plotov, lavičiek a viac.'
                    ],
                    [
                        'title' => 'Opravy a úpravy kovových konštrukcií',
                        'description' => 'Zabezpečujeme opravy a úpravy kovových konštrukcií na budovách a v interiéroch. Naši zámočníci a kováči pracujú s oceľou, hliníkom a ďalšími materiálmi.'
                    ],
                    [
                        'title' => 'Výroba kovových dverí a brán',
                        'description' => 'Vyrobíme pre vás jedinečné kovové dvere a brány na mieru. Každý kus je ručne vytvorený s dôrazom na kvalitu a estetiku.'
                    ],
                    [
                        'title' => 'Zabezpečovacie riešenia pre domy a firmy',
                        'description' => 'Poskytujeme rôzne zabezpečovacie riešenia, vrátane výroby bezpečnostných dverí, zámkov a zabezpečovacích systémov pre domy a firmy.'
                    ],
                    [
                        'title' => 'Kovové remeslárske diela na objednávku',
                        'description' => 'Vytvárame remeslárske diela z kovu na objednávku na základe vašich špecifikácií. Ak máte vlastný dizajn, my ho prevedieme do reality.'
                    ],
                ],
                'Ostatné' => [
                    [
                        'title' => 'Rôzne remeselné služby na mieru',
                        'description' => 'Ponúkame široký výber rôznych remeselných služieb na mieru. Od opráv a úprav po výrobu unikátnych remeselných diel, sme tu pre vaše špeciálne požiadavky.'
                    ],
                    [
                        'title' => 'Kreatívne remeselné riešenia',
                        'description' => 'Naši remeselníci majú bohaté skúsenosti s tvorbou originálnych remeselných výrobkov. Stačí nám povedať, čo si predstavujete, a my to pre vás vytvoríme.'
                    ],
                    [
                        'title' => 'Opravy a údržba domácnosti',
                        'description' => 'Zabezpečíme opravy a údržbu vášho domova. Od malých záležitostí po väčšie projekty, sme vaši spoľahliví remeselníci.'
                    ],
                    [
                        'title' => 'Kreatívne umenie a dekorácie',
                        'description' => 'Máte záujem o kreatívne umenie a dekorácie? Naši remeselníci vytvoria pre vás jedinečné umelecké diela a dekoratívne prvky na ozdobenie vášho domova.'
                    ],
                    [
                        'title' => 'Ostatné remeselné služby na objednávku',
                        'description' => 'Ak hľadáte niečo špecifické, kontaktujte nás. Ponúkame rôzne remeselné služby na objednávku, aby sme uspokojili vaše individuálne potreby.'
                    ],
                ],
            ],
            'Krása a Starostlivosť o Telo' => [
                'Kozmetické služby' => [
                    [
                        'title' => 'Profesionálna kozmetika a omladzovanie',
                        'description' => 'Naše kozmetičky ponúkajú širokú škálu služieb, vrátane omladzovacích procedúr, čistenia pleti a kozmetického makeupu. Získajte krásnu a zdravú pleť u nás.'
                    ],
                    [
                        'title' => 'Dlhodobé odstránenie chlpkov',
                        'description' => 'Sme špecialisti na odstránenie nežiaducich chlpkov. Ponúkame moderné metódy trvalého odstránenia chlpkov, aby ste mali hladkú a bezproblémovú pokožku.'
                    ],
                    [
                        'title' => 'Kozmetické rituály pre relaxáciu',
                        'description' => 'Ponúkame kozmetické rituály, ktoré kombinujú relaxáciu a starostlivosť o pleť. Uvoľnite sa a pozrite sa do zrkadla s novým žiarivým vzhľadom.'
                    ],
                    [
                        'title' => 'Profesionálny makeup pre špeciálne príležitosti',
                        'description' => 'Potrebujete profesionálny makeup na svadbu, ples alebo inú špeciálnu udalosť? Naši vizážisti vám dodajú sebavedomie a krásny vzhľad.'
                    ],
                    [
                        'title' => 'Kozmetické poradenstvo a starostlivosť na diaľku',
                        'description' => 'Ak potrebujete kozmetické rady alebo starostlivosť o pleť na diaľku, sme tu pre vás. Poskytujeme online konzultácie a odporúčania pre vašu krásu.'
                    ],
                ],
                'Kadernícke služby' => [
                    [
                        'title' => 'Moderné strihy a účesy pre všetky typy vlasov',
                        'description' => 'Naši kaderníci majú vášeň pre kreatívne strihy a účesy. Nechajte sa očariť našimi modernými vlasovými trendy a získajte nový look.'
                    ],
                    [
                        'title' => 'Farbenie vlasov a melírovanie',
                        'description' => 'Zmena farby vlasov je vždy zábavná! Ponúkame farbenie vlasov a melírovanie pre zvýraznenie vašej krásy a individuality.'
                    ],
                    [
                        'title' => 'Účesové štýly pre osobné príležitosti',
                        'description' => 'Pripravujete sa na dôležitú udalosť? Naši kaderníci vám vytvoria perfektný účes pre svadbu, oslavu alebo ples.'
                    ],
                    [
                        'title' => 'Odborná starostlivosť o vlasovú pokožku',
                        'description' => 'Nepodceňujte starostlivosť o vlasovú pokožku. Naši kaderníci ponúkajú špeciálne procedúry a produkty pre zdravé vlasy.'
                    ],
                    [
                        'title' => 'Kadernícke rady a konzultácie',
                        'description' => 'Máte otázky ohľadom vlasovej starostlivosti a stylingu? Naši kaderníci sú pripravení poskytnúť vám rady a odporúčania.'
                    ],
                ],
                'Masáže' => [
                    [
                        'title' => 'Relaxačné masáže pre uvoľnenie tela a mysle',
                        'description' => 'Naše relaxačné masáže sú navrhnuté tak, aby vás úplne uvoľnili a odstránili napätie z tela a mysle. Zažite hĺbkovú relaxáciu u nás.'
                    ],
                    [
                        'title' => 'Špeciálne terapeutické masáže',
                        'description' => 'Poskytujeme terapeutické masáže na liečenie konkrétnych problémov, ako sú bolesti chrbta, krku alebo športové zranenia.'
                    ],
                    [
                        'title' => 'Exotické masáže a wellness rituály',
                        'description' => 'Zažite exotické dobrodružstvo pri našich exotických masážach a wellness rituáloch. Ochutnajte rozkoš a relaxáciu.'
                    ],
                    [
                        'title' => 'Masáž pre páry a romantické okamihy',
                        'description' => 'Prežite romantický okamih so svojou polovičkou pri masáži pre páry. Spoločná relaxácia je ideálnym spôsobom, ako sa spojiť.'
                    ],
                    [
                        'title' => 'Individuálna masážová terapia',
                        'description' => 'Naši maséri sa prispôsobia vašim potrebám. Individuálne prístupy a masážová terapia na mieru vám pomôžu dosiahnuť lepšie zdravie a pohodu.'
                    ],
                ],
                'Manikúra a pedikúra' => [
                    [
                        'title' => 'Luxusná manikúra s profesionálnym dizajnom',
                        'description' => 'Užite si luxusnú manikúru s profesionálnym dizajnom nechtov. Ponúkame bohatý výber farieb a vzorov.'
                    ],
                    [
                        'title' => 'Klasickejšia manikúra a pedikúra',
                        'description' => 'Pre tých, ktorí preferujú klasický štýl, máme k dispozícii klasickejšiu manikúru a pedikúru. Získať upravené nechty je jednoduché.'
                    ],
                    [
                        'title' => 'Profesionálna starostlivosť o nechty',
                        'description' => 'Naši špecialisti na nechty vám poskytnú profesionálnu starostlivosť a poradenstvo ohľadom zdravia a vzhľadu vašich nechtov.'
                    ],
                    [
                        'title' => 'Gelové nechty a trvanlivý dizajn',
                        'description' => 'Chcete trvácne nechty s originálnym dizajnom? Gelové nechty a trvanlivý dizajn sú našou špecialitou.'
                    ],
                    [
                        'title' => 'Manikúra a pedikúra pre deti',
                        'description' => 'Ponúkame aj manikúru a pedikúru pre deti. Vaše malé hviezdy si môžu užiť nechtovú zábavu u nás.'
                    ],
                ],
                'Starostlivosť o pleť' => [
                    [
                        'title' => 'Profesionálna starostlivosť o pleť a omladzovanie',
                        'description' => 'Naši dermatológovia a odborníci na pleť ponúkajú profesionálnu starostlivosť o pleť vrátane omladzovacích procedúr a riešení pre zdravú pleť.'
                    ],
                    [
                        'title' => 'Kozmetické procedúry a ošetrenia',
                        'description' => 'Sme špecialisti na kozmetické procedúry a ošetrenia pre rôzne typy pleti. Získajte jasnejšiu a zdravšiu pleť u nás.'
                    ],
                    [
                        'title' => 'Odborné rady a produkty pre starostlivosť o pleť',
                        'description' => 'Poskytujeme odborné rady ohľadom starostlivosti o pleť a odporúčania pre najlepšie produkty pre váš typ pleti.'
                    ],
                    [
                        'title' => 'Individuálna analýza pleti a prispôsobený ošetrenie',
                        'description' => 'Každá pleť je jedinečná. Ponúkame individuálnu analýzu pleti a prispôsobené ošetrenie pre optimálny vzhľad pleti.'
                    ],
                    [
                        'title' => 'Profesionálna starostlivosť o pleť pre mužov',
                        'description' => 'Nepodceňujte starostlivosť o pleť, muži! Naši odborníci vám pomôžu udržať vašu pleť v optimálnom stave.'
                    ],
                ],
                'Ostatné' => [
                    [
                        'title' => 'Špecializované wellness procedúry',
                        'description' => 'Ponúkame špeciálne wellness procedúry na posilnenie tela a zmyslov. Zažite úplnú relaxáciu s našimi špičkovými procedúrami.'
                    ],
                    [
                        'title' => 'Tetovanie a piercing',
                        'description' => 'Máte záujem o tetovanie alebo piercing? Naši odborníci vám poskytnú profesionálnu službu v bezpečnom a hygienickom prostredí.'
                    ],
                    [
                        'title' => 'Exotické kúpele a sauny',
                        'description' => 'Ochutnajte exotický zážitok v našich exotických kúpeľoch a saunách. Relaxujte a očistite svoje telo a myseľ.'
                    ],
                    [
                        'title' => 'Ergoterapia a rehabilitácia',
                        'description' => 'Poskytujeme ergoterapiu a rehabilitáciu pre osoby po zraneniach alebo operáciách. Pomáhame vám získať späť plnú pohyblivosť.'
                    ],
                    [
                        'title' => 'Osobný tréner a fitness programy',
                        'description' => 'Náš osobný tréner vám pomôže dosiahnuť svoje fitness ciele. Ponúkame individuálne tréningy a programy pre všetky vekové kategórie.'
                    ],
                ],
            ],
            'IT a Digitálne Služby' => [
                'Webové dizajnovanie' => [
                    [
                        'title' => 'Profesionálny webový dizajn pre váš biznis',
                        'description' => 'Naši weboví dizajnéri vytvoria moderné a funkčné webové stránky pre váš biznis. Zaujmite klientov s profesionálnym vzhľadom.'
                    ],
                    [
                        'title' => 'Responsívne webové stránky pre mobilné zariadenia',
                        'description' => 'Vaša webová stránka bude optimalizovaná pre mobilné zariadenia, čím zabezpečíte lepší zážitok pre návštevníkov.'
                    ],
                    [
                        'title' => 'E-commerce webové riešenia',
                        'description' => 'Potrebujete online obchod? Navrhneme a vytvoríme e-commerce webovú stránku, aby ste mohli predávať online.'
                    ],
                    [
                        'title' => 'Redizajn existujúcich webových stránok',
                        'description' => 'Ak máte existujúcu webovú stránku, pomôžeme vám s jej vylepšením a modernizáciou, aby bola efektívnejšia.'
                    ],
                    [
                        'title' => 'Webová stránka pre malé podniky a startupy',
                        'description' => 'Naša firma špecializuje na webové stránky pre malé podniky a startupy. Začnite online prítomnosť pre váš nový projekt.'
                    ],
                ],
                'Programovanie' => [
                    [
                        'title' => 'Vytváranie individuálnych softvérových riešení',
                        'description' => 'Poskytujeme vývoj softvérových aplikácií na mieru pre rôzne oblasti. Získajte efektívne nástroje pre váš biznis.'
                    ],
                    [
                        'title' => 'Web aplikácie a backend programovanie',
                        'description' => 'Navrhujeme a vytvárame komplexné webové aplikácie a programy na strane servera pre vaše potreby.'
                    ],
                    [
                        'title' => 'Mobilný aplikácie pre Android a iOS',
                        'description' => 'Potrebujete mobilnú aplikáciu? Naši programátori vytvoria mobilné aplikácie pre Android a iOS platformy.'
                    ],
                    [
                        'title' => 'E-shop a CRM systémy',
                        'description' => 'Vyvíjame e-shopy a CRM systémy na mieru pre lepšiu správu vašich obchodných operácií.'
                    ],
                    [
                        'title' => 'Oprava a údržba existujúcich aplikácií',
                        'description' => 'Máte problémy s existujúcimi aplikáciami? Poskytujeme služby na opravu a údržbu, aby fungovali bezchybne.'
                    ],
                ],
                'Grafický dizajn' => [
                    [
                        'title' => 'Kreatívny grafický dizajn pre marketing a branding',
                        'description' => 'Naši grafickí dizajnéri vytvoria kreatívne vizuály pre vašu marketingovú kampan a brandingové potreby.'
                    ],
                    [
                        'title' => 'Logo návrhy a firemná identita',
                        'description' => 'Navrhujeme unikátne logá a firemnú identitu, ktorá zvýrazní váš biznis a zanechá nezabudnuteľný dojem.'
                    ],
                    [
                        'title' => 'Grafický dizajn pre tlačoviny a digitálny obsah',
                        'description' => 'Poskytujeme grafický dizajn pre tlačoviny, brožúry, letáky aj digitálny obsah pre webové stránky a sociálne médiá.'
                    ],
                    [
                        'title' => 'Ilustrácie a kresby na mieru',
                        'description' => 'Máte špecifické ilustračné požiadavky? Vytvoríme pre vás unikátne ilustrácie a kresby na mieru.'
                    ],
                    [
                        'title' => 'UI/UX dizajn pre webové a mobilné aplikácie',
                        'description' => 'Navrhujeme užívateľsky prívetivé rozhrania a skvelý užívateľský zážitok pre webové a mobilné aplikácie.'
                    ],
                ],
                'Digital marketing' => [
                    [
                        'title' => 'Online reklamná kampaň a SEO optimalizácia',
                        'description' => 'Spustite efektívnu online reklamnú kampaň a zlepšite svoju viditeľnosť na internete s našou SEO optimalizáciou.'
                    ],
                    [
                        'title' => 'Sociálne média manažment a reklama',
                        'description' => 'Spravujeme vaše sociálne médiá a vytvárame cieľovú reklamu na platformách ako Facebook, Instagram a Twitter.'
                    ],
                    [
                        'title' => 'E-mail marketing a automatizácia',
                        'description' => 'Pomáhame vám budovať a udržiavať vzťahy s vašimi zákazníkmi prostredníctvom efektívneho e-mail marketingu a automatizácie.'
                    ],
                    [
                        'title' => 'Analýza dát a výkonnostný marketing',
                        'description' => 'Získajte hlboké pochopenie vašich marketingových kampaní s našou analýzou dát a výkonnostným marketingom.'
                    ],
                    [
                        'title' => 'Online obsah a blogovanie',
                        'description' => 'Poskytujeme kvalitný online obsah a blogovanie, ktoré priláka vašu cieľovú skupinu a zvyšuje angažovanosť.'
                    ],
                ],
                'Oprava a údržba počítačov' => [
                    [
                        'title' => 'Profesionálna oprava a diagnostika počítačov',
                        'description' => 'Poskytujeme profesionálnu opravu a diagnostiku počítačov. Rýchlo a spoľahlivo odstránime technické problémy.'
                    ],
                    [
                        'title' => 'Údržba počítačov a prevencia pred poruchami',
                        'description' => 'Starostlivosť o vaše počítače je dôležitá. Ponúkame údržbu a prevenciu pred poruchami pre vaše zariadenia.'
                    ],
                    [
                        'title' => 'Obnovenie dát a záloha údajov',
                        'description' => 'Stratili ste dáta? Obnovíme vaše straty a zabezpečíme zálohu údajov, aby ste mali pokoj.'
                    ],
                    [
                        'title' => 'Inštalácia a nastavenie softvéru',
                        'description' => 'Nainštalujeme a nastavíme softvér podľa vašich potrieb. Rýchle a jednoduché riešenia pre vaše zariadenia.'
                    ],
                    [
                        'title' => 'Poradenstvo a tréning pre počítačových používateľov',
                        'description' => 'Potrebujete rady alebo školenie? Naši odborníci vám pomôžu s používaním počítačov a softvéru.'
                    ],
                ],
            ],
            'Dom a Záhrada' => [
                'Záhradnícke služby' => [
                    [
                        'title' => 'Záhradný dizajn a údržba',
                        'description' => 'Poskytujeme profesionálny záhradný dizajn a údržbu. Zmeňte svoju záhradu na rajský kútik.'
                    ],
                    [
                        'title' => 'Kosenie a starostlivosť o trávnik',
                        'description' => 'Máme radi krásny trávnik. Poskytujeme služby kosenia a starostlivosti o trávnik pre dokonalý vzhľad.'
                    ],
                    [
                        'title' => 'Sadovnícke práce a záhradné úpravy',
                        'description' => 'Navrhujeme a realizujeme záhradné úpravy a sadovnícke práce podľa vašich predstáv.'
                    ],
                    [
                        'title' => 'Záhradné nábytok a dekorácie',
                        'description' => 'Zaradite si vonkajší priestor? Ponúkame široký výber záhradného nábytku a dekorácií.'
                    ],
                    [
                        'title' => 'Rastliny a kvety na predaj',
                        'description' => 'Nakupujte rastliny a kvety priamo od nás. Pestujeme a ponúkame široký sortiment pre váš záhradný raj.'
                    ],
                ],
                'Údržba a opravy domácnosti' => [
                    [
                        'title' => 'Oprava elektriky a elektrických spotrebičov',
                        'description' => 'Poskytujeme opravy elektriky a elektrických spotrebičov vo vašej domácnosti. Bezpečnosť je pre nás na prvom mieste.'
                    ],
                    [
                        'title' => 'Vodoinštalácie a opravy vodovodov',
                        'description' => 'Máte problémy s vodoinštaláciami? Rýchlo a spoľahlivo vyriešime všetky problémy s vodovodmi.'
                    ],
                    [
                        'title' => 'Opravy a údržba domácich spotrebičov',
                        'description' => 'Opravujeme a udržujeme vaše domáce spotrebiče, aby ste mali plnú funkčnosť vo vašej domácnosti.'
                    ],
                    [
                        'title' => 'Remeselné práce a stavebné opravy',
                        'description' => 'Vykonávame remeselné práce a stavebné opravy. Modernizujeme vašu domácnosť podľa vašich predstáv.'
                    ],
                    [
                        'title' => 'Nábytok a interiérové opravy',
                        'description' => 'Navrhujeme a realizujeme interiérové opravy a úpravy nábytku pre štýlový domov.'
                    ],
                ],
                'Čistenie a upratovanie' => [
                    [
                        'title' => 'Profesionálne upratovacie služby',
                        'description' => 'Najmeme náš tím profesionálov, ktorí vám poskytnú kompletné upratovacie služby pre váš domov alebo kanceláriu.'
                    ],
                    [
                        'title' => 'Okenné čistenie a ošetrenie okien',
                        'description' => 'Okenné čistenie je náročná práca. My sa o ňu postaráme a vaše okná budú opäť krásne čisté.'
                    ],
                    [
                        'title' => 'Hlboké čistenie kobercov a čalúnenia',
                        'description' => 'Koberce a čalúnenie potrebujú starostlivosť. Vyčistíme ich dôkladne a vrátia sa k svojej pôvodnej kráse.'
                    ],
                    [
                        'title' => 'General Cleaning Services',
                        'description' => 'We offer general cleaning services for homes and offices. Let us take care of the cleanliness of your space.'
                    ],
                    [
                        'title' => 'Window Cleaning and Treatment',
                        'description' => 'Window cleaning can be a challenging task. We will handle it, and your windows will be sparkling clean again.'
                    ],
                ],
                'Interiérový dizajn' => [
                    [
                        'title' => 'Profesionálny interiérový dizajn',
                        'description' => 'Navrhujeme a realizujeme profesionálne interiérové dizajny pre domy, byty a komerčné priestory.'
                    ],
                    [
                        'title' => 'Špecializovaný interiérový dizajn pre kúpeľne',
                        'description' => 'Špecializujeme sa na interiérový dizajn kúpeľní. Vytvárame relaxačné a luxusné kúpeľňové priestory.'
                    ],
                    [
                        'title' => 'Custom Furniture and Decorations',
                        'description' => 'We create custom furniture and decorations to bring a unique touch to your interior design.'
                    ],
                    [
                        'title' => 'Commercial Interior Design Services',
                        'description' => 'We offer commercial interior design services for businesses and offices to create a functional and stylish workspace.'
                    ],
                    [
                        'title' => 'Home Staging for Real Estate',
                        'description' => 'Preparing your home for sale? Our home staging services will make it more attractive to potential buyers.'
                    ],
                ],
                'Pestovanie a starostlivosť o rastliny' => [
                    [
                        'title' => 'Pestovanie a starostlivosť o kvetiny',
                        'description' => 'Máme rady kvety a staráme sa o ne s láskou. Ponúkame pestovanie a starostlivosť o kvetiny pre vašu záhradu.'
                    ],
                    [
                        'title' => 'Záhradné poradenstvo a rastlinný dizajn',
                        'description' => 'Poradíme vám s výberom rastlín a navrhneme rastlinný dizajn, aby vaša záhrada vyzerala úžasne.'
                    ],
                    [
                        'title' => 'Pestovanie zeleniny a bylín',
                        'description' => 'Chcete si pestovať vlastnú zeleninu a bylinky? Pomôžeme vám začať a pestovať zdravé plodiny.'
                    ],
                    [
                        'title' => 'Tree Care and Maintenance',
                        'description' => 'We provide tree care and maintenance services to keep your trees healthy and beautiful.'
                    ],
                    [
                        'title' => 'Landscaping and Garden Design',
                        'description' => 'Transform your outdoor space with our landscaping and garden design services. Create a beautiful and functional garden.'
                    ],
                ],
                'Ostatné' => [
                    [
                        'title' => 'Prispôsobené domáce služby',
                        'description' => 'Ponúkame prispôsobené domáce služby pre vaše špecifické potreby. Stačí nám povedať, čo potrebujete.'
                    ],
                    [
                        'title' => 'Kamenné a murárske práce',
                        'description' => 'Vykonávame kamenné a murárske práce pre rôzne projekty. Postavíme to, čo potrebujete.'
                    ],
                    [
                        'title' => 'Hromadné odpadky a čistenie pozemkov',
                        'description' => 'Zaoberáme sa odvozom hromadných odpadov a čistením pozemkov. Urobíme vaše prostredie čistým.'
                    ],
                    [
                        'title' => 'Remeselné a dielenské práce',
                        'description' => 'Máte remeselné alebo dielenské potreby? Naši odborníci vám pomôžu s rôznymi projekty.'
                    ],
                    [
                        'title' => 'Ostatné domáce služby',
                        'description' => 'Poskytujeme rôzne ďalšie domáce služby, aby sme vyhoveli vašim potrebám.'
                    ],
                ],
            ],
            'Auto a Doprava' => [
                'Autoopravárenské služby' => [
                    [
                        'title' => 'Profesionálny servis a opravy áut',
                        'description' => 'Náš auto servis poskytuje profesionálne služby a opravy pre všetky značky áut. Dôverujte nám so svojím vozidlom.'
                    ],
                    [
                        'title' => 'Diagnostika a opravy motorov',
                        'description' => 'Špecializujeme sa na diagnostiku a opravy motorov. Vaše auto bude opäť v top stave.'
                    ],
                    [
                        'title' => 'Opravy brzdových systémov',
                        'description' => 'Opravy brzdových systémov sú u nás rýchle a spoľahlivé. Zachovajte bezpečnosť na cestách.'
                    ],
                    [
                        'title' => 'Pneuservis a výmena pneumatík',
                        'description' => 'Starostlivosť o pneumatiky je dôležitá. Ponúkame pneuservis a výmenu pneumatík pre vaše auto.'
                    ],
                    [
                        'title' => 'Autoelektrikárske opravy',
                        'description' => 'Riešime autoelektrikárske problémy a opravy. Zabezpečte správnu funkčnosť elektrických systémov vášho auta.'
                    ],
                ],
                'Autoumyvárka' => [
                    [
                        'title' => 'Profesionálna umývareň aut',
                        'description' => 'Naša umývareň aut poskytuje profesionálne služby umývania pre všetky typy vozidiel. Vaše auto bude žiariť.'
                    ],
                    [
                        'title' => 'Umývanie a čistenie interiéru auta',
                        'description' => 'Ponúkame umývanie a čistenie interiéru vášho auta. Vráťte si čistotu a sviežosť svojho vozidla.'
                    ],
                    [
                        'title' => 'Detailing a ochrana laku',
                        'description' => 'Detailing a ochrana laku sú našimi špecialitami. Zabezpečte si dlhodobú krásu svojho auta.'
                    ],
                    [
                        'title' => 'Rýchle a efektívne umývanie',
                        'description' => 'Rýchle a efektívne umývanie auta s dôkladnou starostlivosťou. Vaše auto bude pripravené na cestu.'
                    ],
                    [
                        'title' => 'Umývanie nákladných áut a kamiónov',
                        'description' => 'Máme skúsenosti s umývaním aj veľkých nákladných áut a kamiónov. Dôverujte nám svoje vozidlo.'
                    ],
                ],
                'Sťahovacie služby' => [
                    [
                        'title' => 'Profesionálne sťahovanie domov a kancelárií',
                        'description' => 'Poskytujeme profesionálne sťahovacie služby pre domácnosti aj kancelárie. Sťahujeme s opatrnosťou a starostlivosťou.'
                    ],
                    [
                        'title' => 'Rýchle a spoľahlivé sťahovanie',
                        'description' => 'Rýchlo a spoľahlivo presunieme váš majetok na nové miesto. Zabezpečte si pohodlný presun.'
                    ],
                    [
                        'title' => 'Demontáž a montáž nábytku',
                        'description' => 'S demontážou a montážou nábytku vám pomôžeme pri sťahovaní. Ušetrite si čas a námahu.'
                    ],
                    [
                        'title' => 'Skladovanie a prenájom skladovacích priestorov',
                        'description' => 'Poskytujeme aj sklady a skladovacie priestory pre vaše veci. Uchovajte ich v bezpečí.'
                    ],
                    [
                        'title' => 'Medzinárodné sťahovanie',
                        'description' => 'Sťahujeme aj medzinárodne. Dopravíme váš majetok kamkoľvek na svete.'
                    ],
                ],
                'Preprava a kurierske služby' => [
                    [
                        'title' => 'Rýchla kurierska služba',
                        'description' => 'Naša rýchla kurierska služba doručí vašu zásielku včas a spoľahlivo. Dôverujte nám svoje zásielky.'
                    ],
                    [
                        'title' => 'Preprava tovaru a nákladu',
                        'description' => 'Poskytujeme prepravu tovaru a nákladu pre firmy a jednotlivcov. Zabezpečíme bezpečný prevoz.'
                    ],
                    [
                        'title' => 'Medzinárodná doprava a kurierske služby',
                        'description' => 'Realizujeme medzinárodné prepravy a medzinárodné kurierske služby. Doručíme kamkoľvek na svete.'
                    ],
                    [
                        'title' => 'Preprava ťažkého nákladu',
                        'description' => 'Preprava ťažkého nákladu je našou špecializáciou. Zvládneme aj najťažšie úlohy.'
                    ],
                    [
                        'title' => 'Preprava osobných vecí a balíkov',
                        'description' => 'Prepravíme vaše osobné veci a balíky. Zabezpečte si jednoduchý prenos svojich vecí.'
                    ],
                ],
                'Ostatné' => [
                    [
                        'title' => 'Služby pre vodičov a motoristov',
                        'description' => 'Poskytujeme rôzne služby pre vodičov a motoristov, vrátane asistenčných služieb a oprav.'
                    ],
                    [
                        'title' => 'Odpadkové služby a čistenie vozidiel',
                        'description' => 'Zaoberáme sa aj odpadkovými službami a čistením vozidiel. Udržujte svoje auto čisté.'
                    ],
                    [
                        'title' => 'Prenájom vozidiel a autodoprava',
                        'description' => 'Ponúkame prenájom vozidiel a autodopravu pre rôzne účely. Vyberte si vhodné vozidlo.'
                    ],
                    [
                        'title' => 'Ostatné dopravné a autoopravárenské služby',
                        'description' => 'Máme rôzne ďalšie dopravné a autoopravárenské služby, aby sme vyhoveli vašim potrebám.'
                    ],
                    [
                        'title' => 'Ostatné dopravné a autoopravárenské služby',
                        'description' => 'Máme rôzne ďalšie dopravné a autoopravárenské služby, aby sme vyhoveli vašim potrebám.'
                    ],
                ],
            ],
            'Vzdelávanie a Doučovanie' => [
                'Jazykové kurzy' => [
                    [
                        'title' => 'Angličtina pre začiatočníkov',
                        'description' => 'Naučte sa angličtinu od začiatku s našimi profesionálnymi lektormi. Zlepšite svoje jazykové zručnosti rýchlo a efektívne.'
                    ],
                    [
                        'title' => 'Konverzačné kurzy v nemčine',
                        'description' => 'Zlepšite svoje konverzačné schopnosti v nemčine s našimi kurzmistrmi. Rozvíjajte svoje jazykové kompetencie.'
                    ],
                    [
                        'title' => 'Online španielske lekcie',
                        'description' => 'Ponúkame online španielske lekcie pre všetky úrovne. Učte sa španielčinu pohodlne z domova.'
                    ],
                    [
                        'title' => 'Kurzy ruštiny pre pokročilých',
                        'description' => 'Pre hlbokú znalosť ruštiny sú tu naše kurzy pre pokročilých. Dosiahnite vysokú jazykovú úroveň.'
                    ],
                    [
                        'title' => 'Online kurzy v čínštine',
                        'description' => 'Učte sa čínštinu online s našimi skúsenými inštruktormi. Zistite krásu a komplexnosť tohto jazyka.'
                    ],
                ],
                'Doučovanie školských predmetov' => [
                    [
                        'title' => 'Doučovanie matematiky pre študentov',
                        'description' => 'Ponúkame doučovanie matematiky pre študentov všetkých vekových kategórií. Pomôžeme vám zlepšiť svoje výsledky.'
                    ],
                    [
                        'title' => 'Doučovanie chémie a fyziky',
                        'description' => 'Náš tím skúsených tutorov vám pomôže s chémiou a fyzikou. Získajte lepšie pochopenie týchto predmetov.'
                    ],
                    [
                        'title' => 'Online doučovanie angličtiny',
                        'description' => 'Učte sa angličtinu online s našimi kvalifikovanými učiteľmi. Dosiahnite lepšie výsledky vo vašich študijných predmetoch.'
                    ],
                    [
                        'title' => 'Doučovanie dejepisu a literatúry',
                        'description' => 'Náš doučovací program zahŕňa dejepis a literatúru. Pomôžeme vám prehlbovať svoje znalosti v týchto oblastiach.'
                    ],
                    [
                        'title' => 'Doučovanie biológie a chémie',
                        'description' => 'Odborné doučovanie z biológie a chémie pre študentov stredných a základných škôl. Získať lepšie znalosti.'
                    ],
                ],
                'Hudobné a umenécké lekcie' => [
                    [
                        'title' => 'Klavírne lekcie pre začiatočníkov',
                        'description' => 'Začnite svoju hudobnú cestu s našimi klavírnymi lekciami pre začiatočníkov. Rozvíjajte svoj hudobný talent.'
                    ],
                    [
                        'title' => 'Kreslenie a maľovanie umenéckych diel',
                        'description' => 'Umelecké kurzy pre kreslenie a maľovanie. Rozvíjajte svoju kreativitu a tvorivé schopnosti.'
                    ],
                    [
                        'title' => 'Hudobný nástroj pre deti',
                        'description' => 'Ponúkame hudobné lekcie pre deti, kde sa môžu učiť hrať na rôzne hudobné nástroje a objavovať hudbu.'
                    ],
                    [
                        'title' => 'Umenie a výtvarné diela pre pokročilých',
                        'description' => 'Pre tých, ktorí chcú prehlbovať svoje umelecké schopnosti, máme kurzy pre pokročilých výtvarníkov.'
                    ],
                    [
                        'title' => 'Hudobné a tanečné kurzy pre dospelých',
                        'description' => 'Naučte sa tancovať a hrať na hudobný nástroj v dospelosti. Hudba a tanec sú veku nezávislé.'
                    ],
                ],
                'Počítačové a technické školenia' => [
                    [
                        'title' => 'Kurzy programovania pre začiatočníkov',
                        'description' => 'Začnite sa učiť programovať s našimi kurzmistrami. Získať základné programovacie zručnosti.'
                    ],
                    [
                        'title' => 'Školenia v oblasti digitálneho marketingu',
                        'description' => 'Digitálny marketing je dôležitým aspektom moderného podnikania. Naučte sa ho s nami.'
                    ],
                    [
                        'title' => 'Kurzy 3D modelovania a animácie',
                        'description' => 'Náš program zahŕňa kurzy 3D modelovania a animácie pre tých, ktorí sa zaujímajú o vizuálne umenie.'
                    ],
                    [
                        'title' => 'Školenie v oblasti siete a IT bezpečnosti',
                        'description' => 'Učte sa o sieťach a IT bezpečnosti. Ochráňte svoje informácie a zručnosti.'
                    ],
                    [
                        'title' => 'Technické školenie a kurz opravy počítačov',
                        'description' => 'Technické školenie a kurz opravy počítačov pre tých, ktorí chcú získať technické zručnosti.'
                    ],
                ],
                'Ostatné' => [
                    [
                        'title' => 'Príprava na prijímacie skúšky na vysoké školy',
                        'description' => 'Poskytujeme prípravu na prijímacie skúšky na vysoké školy. Zvýšte svoje šance na prijatie.'
                    ],
                    [
                        'title' => 'Online kurzy a školenia',
                        'description' => 'Náš online vzdelávací portál ponúka rôzne kurzy a školenia pre všetkých. Učte sa kedykoľvek, kdekoľvek.'
                    ],
                    [
                        'title' => 'Kurzy pre rozvoj soft skills',
                        'description' => 'Rozvíjajte svoje soft skills, ako je komunikácia a tímová spolupráca, s našimi špecializovanými kurzmistrami.'
                    ],
                    [
                        'title' => 'Kurzy pre lepší osobný rozvoj',
                        'description' => 'Investujte do svojho osobného rastu s našimi kurzami pre lepší osobný rozvoj a sebapoznanie.'
                    ],
                    [
                        'title' => 'Individuálne doučovanie a koučing',
                        'description' => 'Naši inštruktori ponúkajú individuálne doučovanie a koučing na rôzne témy pre vaše osobné a profesionálne ciele.'
                    ],
                ],
            ],
            'Event a Organizácia Podujatí' => [
                'Organizácia svadieb a osláv' => [
                    [
                        'title' => 'Profesionálna organizácia svadieb',
                        'description' => 'Zabezpečíme vám nádhernú svadbu, na ktorú budete spomínať celý život. Sme odborníci na svadobnú organizáciu.'
                    ],
                    [
                        'title' => 'Organizácia osláv a jubileí',
                        'description' => 'Ponúkame širokú škálu služieb na organizáciu osláv a jubileí pre všetky príležitosti. Oslovte nás pre nezabudnuteľné podujatie.'
                    ],
                    [
                        'title' => 'Elegantná organizácia svadieb na mieru',
                        'description' => 'Naši svadobní organizátori vám pomôžu vytvoriť elegančnú svadbu presne podľa vašich predstáv. Každý detail bude premyslený.'
                    ],
                    [
                        'title' => 'Jubileá pre všetky vekové kategórie',
                        'description' => 'Pripravíme skvelé jubileum pre každý vek. Oslávte špeciálnu príležitosť s nami.'
                    ],
                    [
                        'title' => 'Elegantný svadobný dizajn',
                        'description' => 'Ponúkame elegátny dizajn pre vašu svadbu, ktorý prinesie šarm a štýl do každého detailu. Vaša svadba bude vyzerať úžasne.'
                    ],
                ],
                'Catering a stravovacie služby' => [
                    [
                        'title' => 'Profesionálny catering pre akcie',
                        'description' => 'Naša spoločnosť ponúka vynikajúci catering pre rôzne podujatia. Vaši hostia budú nadšení naším jedlom.'
                    ],
                    [
                        'title' => 'Individuálny catering na mieru',
                        'description' => 'Pripravíme cateringový servis presne podľa vašich požiadaviek. Vychutnajte si kvalitné jedlo v pohodlí svojho domova.'
                    ],
                    [
                        'title' => 'Luxusný catering pre exkluzívne udalosti',
                        'description' => 'Ponúkame luxusný catering pre exkluzívne udalosti a galavečere. Urobte dojem na vašich hostí.'
                    ],
                    [
                        'title' => 'Cateringový servis pre firemné stretnutia',
                        'description' => 'Zabezpečíme kvalitný catering pre vaše firemné stretnutia a konferencie. Vychutnajte si profesionálnu stravu v pracovnom prostredí.'
                    ],
                    [
                        'title' => 'Dezertný stôl pre sladkých milovníkov',
                        'description' => 'Pripravíme vám lahodný dezertný stôl so širokým výberom dezertov pre všetkých, ktorí milujú sladkosti.'
                    ],
                ],
                'Fotografické a video služby' => [
                    [
                        'title' => 'Profesionálna fotografia pre podujatia',
                        'description' => 'Zachytíme vaše špeciálne chvíle s našou profesionálnou fotografiou pre podujatia. Každý okamih bude nezabudnuteľný.'
                    ],
                    [
                        'title' => 'Kreatívne videoprodukcie',
                        'description' => 'Vytvoríme kreatívne videá pre vaše podujatia. Naša videoprodukcia prinesie vašim príbehom život.'
                    ],
                    [
                        'title' => 'Štýlová portrétna fotografia',
                        'description' => 'Zachytíme vašu osobnosť a štýl v našich štýlových portrétnych fotografiách. Získajte unikátne snímky.'
                    ],
                    [
                        'title' => 'Kreatívna videoprodukcia pre hudobné akcie',
                        'description' => 'Vytvoríme kreatívne hudobné videá pre vaše koncerty a hudobné podujatia. Hudba, ktorú môžete vidieť.'
                    ],
                    [
                        'title' => 'Fotokabíny pre zábavu na podujatiach',
                        'description' => 'Zabezpečíme fotokabíny pre vaše podujatia, aby si hostia mohli vytvoriť zábavné a nezabudnuteľné fotografie.'
                    ],
                ],
                'Hudobné a DJ služby' => [
                    [
                        'title' => 'Profesionálny DJ pre vašu párty',
                        'description' => 'Urobte svoju párty nezabudnuteľnou s naším profesionálnym DJ-om. Hudba, ktorá dostane ľudí na parket.'
                    ],
                    [
                        'title' => 'Živá hudba pre rôzne udalosti',
                        'description' => 'Poskytujeme živú hudbu pre rôzne udalosti, vrátane koncertov a firemných večierkov. Hudba, ktorá osloví.'
                    ],
                    [
                        'title' => 'DJ pre retro párty',
                        'description' => 'Oživte retro atmosféru s naším DJ-om, ktorý bude prehrávať najväčšie hity minulých desaťročí. Skvelá zábava pre všetkých.'
                    ],
                    [
                        'title' => 'Živý koncert pre firmený večierok',
                        'description' => 'Poskytneme živý hudobný koncert pre váš firemný večierok alebo podujatie. Hudba, ktorá vás dostane do rytmu.'
                    ],
                    [
                        'title' => 'Hudobný workshop pre deti',
                        'description' => 'Organizujeme hudobné workshopy pre deti, kde sa môžu naučiť základy hry na hudobných nástrojoch a spievať.'
                    ],
                ],
                'Ostatné' => [
                    [
                        'title' => 'Technická podpora pre podujatia',
                        'description' => 'Poskytujeme technickú podporu pre rôzne podujatia, vrátane zvukovej techniky a osvetlenia. Zabezpečte si bezproblémový priebeh.'
                    ],
                    [
                        'title' => 'Zábavné atrakcie a animácie',
                        'description' => 'Ponúkame rôzne zábavné atrakcie a animácie pre deti aj dospelých na vaše podujatia. Zábava je zaručená.'
                    ],
                    [
                        'title' => 'Technická podpora pre svadobné hostiny',
                        'description' => 'Zabezpečíme technickú podporu pre svadobné hostiny vrátane ozvučenia a svetelných efektov. Vytvorte si dokonalú svadbu.'
                    ],
                    [
                        'title' => 'Zimný festival pre rodiny',
                        'description' => 'Pripravíme zábavný zimný festival pre rodiny s detskými atrakciami a aktivitami na snehu. Zimná zábava pre všetkých.'
                    ],
                    [
                        'title' => 'Kreatívna výtvarná dielňa pre deti',
                        'description' => 'Pripravíme kreatívnu výtvarnú dielňu pre deti, kde môžu vyjadriť svoju kreativitu a vytvoriť umelecké diela.'
                    ],
                ],
            ],
            'Osobné a Domáce Služby' => [
                'Osobný asistent' => [
                    [
                        'title' => 'Osobný asistent pre seniorov',
                        'description' => 'Poskytujeme osobnú asistenciu pre seniorov, vrátane pomoci pri bežných aktivitách a spoločenskom interakcii.'
                    ],
                    [
                        'title' => 'Osobný asistent pre študentov',
                        'description' => 'Naši osobní asistenti pomáhajú študentom s organizáciou a plánovaním, aby dosiahli akademický úspech.'
                    ],
                    [
                        'title' => 'Individuálny osobný asistent',
                        'description' => 'Poskytujeme individuálnu asistenciu pre každého klienta na základe ich potrieb a preferencií.'
                    ],
                    [
                        'title' => 'Osobný asistent pre zdravotné problémy',
                        'description' => 'Sme tu pre klientov so zdravotnými problémami, poskytujeme im odbornú a empatickú starostlivosť.'
                    ],
                    [
                        'title' => 'Osobný asistent pre podnikateľov',
                        'description' => 'Naši asistenti pomáhajú podnikateľom s administratívnymi úlohami, aby mohli viac času venovať svojmu podnikaniu.'
                    ],
                ],

                'Starostlivosť o deti a babysitting' => [
                    [
                        'title' => 'Kvalitný babysitting pre vaše deti',
                        'description' => 'Naši skúsení babysitteri sa postarajú o vaše deti s láskou a starostlivosťou, zatiaľ čo vy si oddýchnete.'
                    ],
                    [
                        'title' => 'Náučné aktivity pre deti',
                        'description' => 'Ponúkame náučné aktivity pre deti, ktoré kombinujú zábavu s učením a rozvojom.'
                    ],
                    [
                        'title' => 'Babysitting pre špeciálne potreby',
                        'description' => 'Poskytujeme babysitting pre deti so špeciálnymi potrebami, aby mali primeranú starostlivosť a pozornosť.'
                    ],
                    [
                        'title' => 'Denný babysitting a dohľad',
                        'description' => 'Naši babysitteri sú k dispozícii na denný babysitting a dohľad nad deťmi počas pracovných hodín.'
                    ],
                    [
                        'title' => 'Babysitting na pláži alebo dovolenke',
                        'description' => 'Pre tých, čo chcú stráviť oddychovú dovolenku, poskytujeme babysitting na pláži a dovolenkách.'
                    ],
                ],

                'Čistenie a upratovanie' => [
                    [
                        'title' => 'Kompletné upratovacie služby',
                        'description' => 'Ponúkame kompletné upratovacie služby pre domácnosti a podniky, vrátane čistenia, vysávania a umývania.'
                    ],
                    [
                        'title' => 'Profesionálne okenné umývanie',
                        'description' => 'Zabezpečíme profesionálne umývanie okien a sklenených povrchov pre jasný výhľad.'
                    ],
                    [
                        'title' => 'Upačovanie a žehlenie bielizne',
                        'description' => 'Naši pracovníci upracú a zžehlia vašu bielizeň, čo vám ušetrí čas a námahu.'
                    ],
                    [
                        'title' => 'Čistenie po rekonštrukciách',
                        'description' => 'Po rekonštrukciách a stavebných prácach urobíme dôkladné čistenie a odstránime stavebný odpad.'
                    ],
                    [
                        'title' => 'Upratovanie kancelárií a komerčných priestorov',
                        'description' => 'Poskytujeme upratovacie služby pre kancelárie a komerčné priestory, aby boli vždy čisté a udržiavané.'
                    ],
                ],

                'Starostlivosť o seniorov' => [
                    [
                        'title' => 'Kvalitná domáca starostlivosť pre seniorov',
                        'description' => 'Náš tím poskytuje kvalitnú domácu starostlivosť pre seniorov, vrátane lekárskych kontrol a spoločenskej starostlivosti.'
                    ],
                    [
                        'title' => '24-hodinová starostlivosť o seniorov',
                        'description' => 'Poskytujeme 24-hodinovú starostlivosť o seniorov, aby mohli zostať v pohodlí svojho domova s dôverou v odbornú starostlivosť.'
                    ],
                    [
                        'title' => 'Doprovod seniorov na prechádzky',
                        'description' => 'Náš personál sa postará o prechádzky seniorov, aby mohli aktívne a bezpečne tráviť čas vonku.'
                    ],
                    [
                        'title' => 'Pomoc s každodennými aktivitami',
                        'description' => 'Starostlivosť o seniorov zahŕňa pomoc s každodennými aktivitami, vrátane obliekania, stravovania a hygieny.'
                    ],
                    [
                        'title' => 'Starostlivosť o seniorov s demenciou',
                        'description' => 'Špecializujeme sa na starostlivosť o seniorov s demenciou, poskytujeme podporu nielen im, ale aj ich rodinám.'
                    ],
                ],

                'Domáci majster' => [
                    [
                        'title' => 'Remeselné opravy a údržba domu',
                        'description' => 'Naši domáci majstri vykonávajú rôzne remeselné opravy a údržbu domov, vrátane elektrikárskej, truhlárskej a iných prác.'
                    ],
                    [
                        'title' => 'Montáž nábytku a montáž techniky',
                        'description' => 'Zabezpečíme montáž nábytku a inštaláciu techniky pre váš domov, aby ste mali všetko pripravené na použitie.'
                    ],
                    [
                        'title' => 'Malé stavebné práce a renovácie',
                        'description' => 'Vykonáme malé stavebné práce a renovácie, ktoré zlepšia funkčnosť a vzhľad vášho domu.'
                    ],
                    [
                        'title' => 'Údržba záhrady a exteriéru',
                        'description' => 'Sme tu aj pre údržbu záhrady a exteriérových priestorov, aby boli vaše exteriéry krásne a upravené.'
                    ],
                    [
                        'title' => 'Rýchle opravy a servisné práce',
                        'description' => 'Naši domáci majstri sú k dispozícii pre rýchle opravy a servisné práce, aby ste mali všetko v poriadku.'
                    ],
                ],

                'Ostatné' => [
                    [
                        'title' => 'Domáci učiteľ pre deti',
                        'description' => 'Ponúkame domácich učiteľov pre deti, ktorí potrebujú doplnkovú vzdelávaciu podporu a doučovanie.'
                    ],
                    [
                        'title' => 'Organizácia rodinných osláv',
                        'description' => 'Organizujeme rodinné oslavy a špeciálne podujatia, aby ste si mohli užiť čas s rodinou a priateľmi.'
                    ],
                    [
                        'title' => 'Zábavné animácie pre deti',
                        'description' => 'Poskytujeme zábavné animácie pre deti na rôzne príležitosti, aby sa malí hostia dobre zabavili.'
                    ],
                    [
                        'title' => 'Kurzy umenia a remesiel',
                        'description' => 'Organizujeme kurzy umenia a remesiel pre všetkých, ktorí sa chcú naučiť nové zručnosti a tvorivé dovednosti.'
                    ],
                    [
                        'title' => 'Odborná pomoc pri organizovaní domácnosti',
                        'description' => 'Poskytujeme odbornú pomoc pri organizovaní domácnosti, vrátane plánovania a efektívneho využitia priestoru.'
                    ],
                ],
            ],
            'Zdravie a Wellness' => [
                'Fyzioterapia a rehabilitácia' => [
                    [
                        'title' => 'Profesionálna fyzioterapia',
                        'description' => 'Naši fyzioterapeuti poskytujú profesionálnu starostlivosť a rehabilitáciu pre rôzne typy zranení a ochorení.'
                    ],
                    [
                        'title' => 'Fyzioterapia po operácii',
                        'description' => 'Pomáhame pacientom s rehabilitáciou po chirurgických zákrokoch, aby sa rýchlo vrátili do plnej formy.'
                    ],
                    [
                        'title' => 'Fyzioterapia pre športovcov',
                        'description' => 'Špecializujeme sa na fyzioterapiu pre športovcov, pomáhame im zlepšiť svoju kondíciu a výkonnosť.'
                    ],
                    [
                        'title' => 'Rehabilitácia chronických bolestí',
                        'description' => 'Poskytujeme rehabilitáciu pre osoby trpiace chronickými bolesťami, aby získali úľavu a komfort.'
                    ],
                    [
                        'title' => 'Domáca fyzioterapia',
                        'description' => 'Ponúkame domácu fyzioterapiu pre tých, ktorí potrebujú odbornú starostlivosť v pohodlí svojho domova.'
                    ],
                ],

                'Výživové poradenstvo' => [
                    [
                        'title' => 'Individuálne výživové poradenstvo',
                        'description' => 'Poskytujeme individuálne výživové poradenstvo pre zlepšenie stravovacích návykov a zdravého životného štýlu.'
                    ],
                    [
                        'title' => 'Výživový plán pre chudnutie',
                        'description' => 'Navrhujeme výživové plány a programy pre chudnutie, aby ste dosiahli svoje ciele.'
                    ],
                    [
                        'title' => 'Výživová podpora pre športovcov',
                        'description' => 'Pomáhame športovcom dosiahnuť optimálnu výživu pre zlepšenie výkonnosti a regenerácie.'
                    ],
                    [
                        'title' => 'Výživové poradenstvo pre deti',
                        'description' => 'Poskytujeme výživové poradenstvo pre deti a mládež, aby mali vyváženú stravu.'
                    ],
                    [
                        'title' => 'Výživový plán pre zdravý životný štýl',
                        'description' => 'Vypracujeme výživové plány pre zdravý životný štýl, ktoré sú prispôsobené individuálnym potrebám klienta.'
                    ],
                ],

                'Jóga a pilates inštruktori' => [
                    [
                        'title' => 'Jóga lekcie pre začiatočníkov',
                        'description' => 'Začnite svoju cestu k zdraviu a pohybu s našimi jóga inštruktormi pre začiatočníkov.'
                    ],
                    [
                        'title' => 'Pilates cvičenia pre silu a flexibility',
                        'description' => 'Pilates je skvelý spôsob, ako zlepšiť silu a flexibility tela. Navštívte naše lekcie s profesionálnymi inštruktormi.'
                    ],
                    [
                        'title' => 'Pokročilé jóga techniky',
                        'description' => 'Pre tých, čo majú skúsenosti s jóga, ponúkame pokročilé techniky na rozvoj tela a mysle.'
                    ],
                    [
                        'title' => 'Meditačné a relaxačné cvičenia',
                        'description' => 'Uvoľnite sa a nájdite vnútorný pokoj s našimi meditačnými a relaxačnými lekciami vedenými odborníkmi.'
                    ],
                    [
                        'title' => 'Online lekcie jógy a pilates',
                        'description' => 'Ak preferujete online cvičenia, môžete sa zapojiť do našich virtuálnych lekcií jógy a pilates kedykoľvek a kdekoľvek.'
                    ],
                ],

                'Osobný fitness tréner' => [
                    [
                        'title' => 'Individuálne tréningové programy',
                        'description' => 'Naši osobní fitness tréneri vypracujú individuálne tréningové programy, ktoré sú prispôsobené vašim cieľom.'
                    ],
                    [
                        'title' => 'Tréning pre nárast svalovej hmoty',
                        'description' => 'Ak chcete získať svalovú hmotu a formu, naši tréneri vás sprevádzajú cestou k úspechu.'
                    ],
                    [
                        'title' => 'Fitness tréning pre chudnutie',
                        'description' => 'Znížte telesný tuk a dosiahnite svoju ideálnu váhu s naším fitness tréningom pre chudnutie.'
                    ],
                    [
                        'title' => 'Tréning pre zlepšenie kondície',
                        'description' => 'Zlepšite svoju kondíciu a výkonnosť s našimi tréningovými programami pre všetky úrovne.'
                    ],
                    [
                        'title' => 'Online tréning s osobným trénerom',
                        'description' => 'Máte prístup k online tréningovým sedeniam so svojím osobným trénerom, ktorý vás motivuje a usmerní.'
                    ],
                ],

                'Psychologické poradenstvo' => [
                    [
                        'title' => 'Individuálne terapeutické sedenia',
                        'description' => 'Poskytujeme individuálne terapeutické sedenia s licencovanými psychológmi pre riešenie osobných problémov a výziev.'
                    ],
                    [
                        'title' => 'Poradenstvo pre duševné zdravie',
                        'description' => 'Starostlivosť o duševné zdravie je kľúčová. Naši psychológovia vám pomôžu nájsť rovnováhu.'
                    ],
                    [
                        'title' => 'Rodinné a partnerské terapie',
                        'description' => 'Ponúkame rodinné a partnerské terapie, aby sme pomohli zlepšiť vzťahy a komunikáciu.'
                    ],
                    [
                        'title' => 'Terapie pre stres a úzkosť',
                        'description' => 'Ak sa cítite stiesnení stresom alebo úzkosťou, naši terapeuti vám poskytnú nástroje na zvládnutie týchto pocitov.'
                    ],
                    [
                        'title' => 'Online terapie a poradenstvo',
                        'description' => 'Máme k dispozícii online terapie a poradenstvo, aby sme boli dostupní v čase, ktorý vám vyhovuje.'
                    ],
                ],

                'Ostatné' => [
                    [
                        'title' => 'Wellness dovolenka a relaxácia',
                        'description' => 'Zažite relaxáciu na našich wellness dovolenkách, ktoré kombinujú pohodlie a starostlivosť o vaše telo.'
                    ],
                    [
                        'title' => 'Kurzy sebaobrany a relaxácie',
                        'description' => 'Naučte sa sebaobranu a techniky relaxácie na našich kurzoch, ktoré posilnia vaše telo a myseľ.'
                    ],
                    [
                        'title' => 'Reiki a energoterapia',
                        'description' => 'Ponúkame Reiki a energoterapiu pre obnovu energie a harmonizáciu tela a ducha.'
                    ],
                    [
                        'title' => 'Masážne terapie a wellness procedúry',
                        'description' => 'Uvoľnite sa s našimi masážnymi terapiami a wellness procedúrami, ktoré poskytujú úľavu a relaxáciu.'
                    ],
                    [
                        'title' => 'Zdravotné poradenstvo a preventívna starostlivosť',
                        'description' => 'Poskytujeme zdravotné poradenstvo a preventívnu starostlivosť pre zachovanie vášho zdravia a pohody.'
                    ],
                ],
            ],
            'Finančné a Právne Služby' => [

                'Účtovnícke a daňové poradenstvo' => [
                    [
                        'title' => 'Profesionálne účtovnícke služby',
                        'description' => 'Naši účtovníci sú pripravení viesť vašu účtovnú dokumentáciu s presnosťou a starostlivosťou, ktorú si zaslúžite.'
                    ],
                    [
                        'title' => 'Daňové poradenstvo a optimalizácia',
                        'description' => 'Pomôžeme vám optimalizovať svoje daňové povinnosti a zabezpečiť, aby ste neplatili viac, ako je nevyhnutné.'
                    ],
                    [
                        'title' => 'Audit a kontrola účtovnej evidencie',
                        'description' => 'Sme odborníci na audit a kontrolu účtovnej evidencie, aby ste mali istotu v správe vašich financií.'
                    ],
                    [
                        'title' => 'Daňové priznania pre fyzické a právnické osoby',
                        'description' => 'Poskytujeme služby pri príprave daňových priznaní pre fyzické a právnické osoby s dôrazom na každý detail.'
                    ],
                    [
                        'title' => 'Poradenstvo v oblasti DPH a odvodov',
                        'description' => 'Sme tu, aby sme vám pomohli s poradenstvom v oblasti dane z pridanej hodnoty (DPH) a sociálnych odvodov.'
                    ],
                ],

                'Právne poradenstvo a služby' => [
                    [
                        'title' => 'Advokátske služby pre právnické veci',
                        'description' => 'Naši advokáti sú pripravení zastupovať vás v právnych záležitostiach a poskytovať právne poradenstvo.'
                    ],
                    [
                        'title' => 'Rodinné právo a rozvodové poradenstvo',
                        'description' => 'Riešime záležitosti rodinného práva vrátane rozvodov a starostlivosti o deti s ohľadom na vaše záujmy.'
                    ],
                    [
                        'title' => 'Právne zastúpenie v občianskych sporoch',
                        'description' => 'Poskytujeme právne zastúpenie v občianskych sporoch a pomáhame riešiť konflikty mimosúdnou cestou.'
                    ],
                    [
                        'title' => 'Obchodné právo a zmluvné služby',
                        'description' => 'Pomáhame vám s obchodným právom a prípravou zmlúv, aby ste mali právnu ochranu vo vašich obchodných transakciách.'
                    ],
                    [
                        'title' => 'Poradenstvo v oblasti duševného vlastníctva',
                        'description' => 'Poskytujeme poradenstvo v oblasti duševného vlastníctva a pomáhame chrániť vaše autorské a patentové práva.'
                    ],
                ],

                'Finančné plánovanie a poradenstvo' => [
                    [
                        'title' => 'Individuálne finančné plánovanie',
                        'description' => 'Vypracujeme individuálny finančný plán, ktorý bude zodpovedať vašim cieľom a potrebám.'
                    ],
                    [
                        'title' => 'Investičné poradenstvo a portfólio správa',
                        'description' => 'Ponúkame investičné poradenstvo a správu portfólia, aby vaše peniaze pracovali efektívne.'
                    ],
                    [
                        'title' => 'Plánovanie dôchodku a zabezpečenie pre budúcnosť',
                        'description' => 'Pripravíme vás na dôchodok a zabezpečíme, aby ste mali finančnú istotu aj v budúcnosti.'
                    ],
                    [
                        'title' => 'Stratégie úspor a dlhodobé plánovanie',
                        'description' => 'Vytvoríme stratégie úspor a dlhodobého plánovania, ktoré vás povedú k finančnej stabilité.'
                    ],
                    [
                        'title' => 'Plánovanie dane a optimalizácia príjmu',
                        'description' => 'Pomáhame s plánovaním dane a optimalizáciou príjmu, aby ste mali maximálny prínos zo svojich financií.'
                    ],
                ],

                'Poistenie a rizikové management služby' => [
                    [
                        'title' => 'Poradenstvo v oblasti poistenia',
                        'description' => 'Poskytujeme komplexné poradenstvo v oblasti poistenia, aby ste boli dobre krytí voči rizikám.'
                    ],
                    [
                        'title' => 'Životné poistenie a plánovanie dožitia',
                        'description' => 'Zabezpečíme váš finančný dožitok a zabezpečenie pre vašu rodinu prostredníctvom životného poistenia.'
                    ],
                    [
                        'title' => 'Poistenie majetku a nehnutelností',
                        'description' => 'Ochráníme váš majetok a nehnuteľnosti správnym poistením, aby ste mali pokojný spánok.'
                    ],
                    [
                        'title' => 'Rizikový manažment a analýza',
                        'description' => 'Vykonáme rizikový manažment a analýzu vašej finančnej situácie na ochranu pred neočakávanými udalosťami.'
                    ],
                    [
                        'title' => 'Odborné poradenstvo v oblasti poistenia',
                        'description' => 'Sme odborníci v oblasti poistenia a rizikového manažmentu, ktorí vám pomôžu nájsť najlepšie riešenia.'
                    ],
                ],

                'Realitné a hypotekárne služby' => [
                    [
                        'title' => 'Kúpa a predaj nehnuteľností',
                        'description' => 'Zabezpečíme hladký proces kúpy alebo predaja nehnuteľnosti a poskytneme vám expertné rady.'
                    ],
                    [
                        'title' => 'Hypotekárne poradenstvo',
                        'description' => 'Pomáhame s hypotekárnym financovaním a zabezpečíme, aby ste mali výhodné podmienky.'
                    ],
                    [
                        'title' => 'Hodnotenie nehnuteľností a obchodné poradenstvo',
                        'description' => 'Vykonáme hodnotenie nehnuteľností a poskytneme obchodné poradenstvo pre investície do nehnuteľností.'
                    ],
                    [
                        'title' => 'Pronájom nehnuteľností',
                        'description' => 'Ponúkame služby na pronájom nehnuteľností a správu nájomných vzťahov pre majiteľov.'
                    ],
                    [
                        'title' => 'Poradenstvo v oblasti realitného trhu',
                        'description' => 'Sme váš partner pre poradenstvo v oblasti realitného trhu, či už ide o byty, domy alebo komerčné nehnuteľnosti.'
                    ],
                ],

                'Ostatné' => [
                    [
                        'title' => 'Investičné poradenstvo do kryptomien',
                        'description' => 'Poskytujeme investičné poradenstvo do kryptomien a blockchain technológií pre nových a skúsených investorov.'
                    ],
                    [
                        'title' => 'Poradenstvo v oblasti firemných financií',
                        'description' => 'Pomáhame firmám s finančným plánovaním, manažmentom rizík a investíciami do rastu.'
                    ],
                    [
                        'title' => 'Poradenstvo v oblasti dôchodkového sporenia',
                        'description' => 'Vypracujeme stratégiu pre váš dôchodok a pomôžeme vám dosiahnuť finančnú nezávislosť.'
                    ],
                    [
                        'title' => 'Poradenstvo v oblasti dedičstva a závetov',
                        'description' => 'Zabezpečíme správne plánovanie dedičstva a závetov pre zachovanie majetku v rodine.'
                    ],
                    [
                        'title' => 'Poradenstvo v oblasti investovania do umeleckých diel',
                        'description' => 'Sme špecialisti na investovanie do umeleckých diel a poskytujeme rady pre zbierateľov a investičných nadšencov.'
                    ],
                ],
            ],
        ];

        foreach ($adsContent as $categoryName => $subcategories) {
            $category = Category::where('name', $categoryName)->first();

            if (!$category) {
                echo "Category '{$categoryName}' not found.\n";
                continue;
            }

            foreach ($subcategories as $subcatName => $ads) {
                $subcategory = Subcategory::where('name', $subcatName)->first();

                if (!$subcategory) {
                    echo "Subcategory '{$subcatName}' not found.\n";
                    continue;
                }

                foreach ($ads as $ad) {
                    DB::table('advertisements')->insert([
                        'title' => $ad['title'],
                        'description' => $ad['description'],
                        'user_id' => $users->random()->id,
                        'category_id' => $category->id,
                        'subcategory_id' => $subcategory->id,
                        'location_id' => rand(1, 2780),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }

    }
}
