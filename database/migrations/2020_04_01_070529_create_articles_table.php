<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('article_text');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('date')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });
        DB::table('articles')->insert([
            ['user_id' => '4', 'title' => 'One piece su wikipedia', 'article_text' => 'One Piece (ONE PIECE - ワンピース Wan Pīsu?) è un manga scritto e disegnato da Eiichirō Oda, serializzato sulla rivista Weekly Shōnen Jump di Shūeisha dal 22 luglio 1997[1][2]. La casa editrice ne raccoglie periodicamente i capitoli in volumi formato tankōbon, di cui il primo è stato pubblicato il 24 dicembre. L\'edizione italiana è curata da Star Comics[3], che ne ha iniziato la pubblicazione in albi corrispondenti ai volumi giapponesi il 1º luglio 2001. La storia segue le avventure di Monkey D. Rufy, un ragazzo il cui corpo ha assunto le proprietà della gomma dopo aver inavvertitamente ingerito il frutto del diavolo Gom Gom. Raccogliendo attorno a sé una ciurma, Rufy esplora la Rotta Maggiore in cerca del leggendario tesoro One Piece e inseguendo il sogno di diventare il nuovo Re dei pirati. One Piece è adattato in una serie televisiva anime, prodotta da Toei Animation e trasmessa in Giappone su Fuji TV dal 20 ottobre 1999. L\'edizione italiana è edita da Merak Film ed è andata in onda su Italia 1[3] dal 5 novembre 2001 per poi continuare su Italia 2 nel 2012; inizialmente intitolata All\'arrembaggio!, la serie ha avuto diversi cambi di denominazione nel corso delle stagioni, fino ad assestarsi sull\'originale One Piece. Toei Animation ha prodotto inoltre 13 special televisivi, 14 film anime, due cortometraggi 3D, un ONA e un OAV. Svariate compagnie ne hanno tratto merchandise di vario genere, come colonne sonore, videogiochi e giocattoli. One Piece ha goduto di uno straordinario successo. Diversi volumi del manga hanno infranto record di vendite e di tiratura iniziale in Giappone. Con oltre 470 milioni di copie in circolazione al 2020, è il manga ad avere venduto di più al mondo.[4] Il 15 giugno 2015 è entrato inoltre nel Guinness dei primati come serie a fumetti disegnata da un singolo autore con il maggior numero di copie pubblicate: oltre 320 milioni[5].'],
            ['user_id' => '4', 'title' => 'FMA su wikipedia', 'article_text' => 'Fullmetal Alchemist (鋼の錬金術師 Hagane no renkinjutsushi?, lett. "L\'alchimista d\'acciaio") è un manga scritto e disegnato da Hiromu Arakawa. L\'opera è stata serializzata sulla rivista di Square Enix Monthly Shōnen Gangan dal 12 luglio 2001 al 12 giugno 2010 per un totale di 108 capitoli più un capitolo speciale; questi sono in seguito stati raccolti in 27 volumi sotto l\'etichetta Gangan Comics e pubblicati tra il 22 gennaio 2002 e il 22 novembre 2010. Il manga è stato tradotto in diverse lingue, tra cui in italiano da Planet Manga, in inglese da Viz Media, in francese da Kurokawa, in spagnolo da Norma Editorial e in coreano da Haksan Publishing. La storia segue i giovani alchimisti Edward e Alphonse Elric, due fratelli in viaggio per la nazione di Amestris alla ricerca della leggendaria pietra filosofale con lo scopo di riottenere i loro corpi originari persi in una trasmutazione umana finita male. Durante il loro viaggio scopriranno un piano orchestrato da sette esseri chiamati homunculus che potrebbe distruggere il Paese se non fermati in tempo. Dal manga sono state tratte due serie televisive anime prodotte dallo studio d\'animazione Bones: Fullmetal Alchemist (鋼の錬金術師 Hagane no renkinjutsushi?) conta 51 episodi, trasmessi tra il 2003 ed il 2004, e traspone fedelmente il manga solo per i primi volumi, narrando poi una storia originale; Fullmetal Alchemist: Brotherhood (鋼の錬金術師 FULLMETAL ALCHEMIST Hagane no renkinjutsushi - FULLMETAL ALCHEMIST?), è un adattamento fedele del manga in 64 episodi, mandati in onda tra il 2009 ed il 2010. La serie ha avuto un enorme successo, generando anche altri adattamenti, tra cui film animati, romanzi e videogiochi. L\'universo di Fullmetal Alchemist, ambientato nei primi anni del 1900[1], diverge dal nostro principalmente per la presenza dell\'alchimia: questa è una scienza che utilizza l\'energia scaturita dai movimenti della crosta terrestre[1] e la incanala tramite un cerchio alchemico per compiere un processo chiamato trasmutazione, ovvero la modifica delle proprietà di un oggetto. La trasmutazione si divide in tre fasi principali: la comprensione della struttura della materia, la scomposizione e la ricomposizione[2]. Inoltre l\'alchimia è governata da una legge che si pone come caposaldo di questa scienza: il principio dello scambio equivalente, il quale impone che, durante una trasmutazione, la massa dell\'oggetto di base e quello trasmutato debbano essere identici, così come le proprietà dei due oggetti[3]. Coloro che riescono ad utilizzare l\'alchimia assumono la denominazione di alchimisti. La nazione in cui si svolgono le vicende è Amestris, un Paese governato da un regime militare il cui capo è chiamato "comandante supremo"[4]; la vocazione militaristica di Amestris si rivela anche nel fatto che la nazione è periodicamente in guerra con diversi Stati confinanti ed è stata teatro di una sanguinosa guerra civile[1]. Il Paese viene diviso essenzialmente in cinque regioni, ognuna corrispondente ad un punto cardinale più il centro, che ospita la capitale Central City. Oltre che ai soldati, i quali sono divisi in gradi da recluta a generale, l\'ingresso nell\'esercito è aperto anche agli alchimisti che, dopo aver superato un test, ottengono il titolo di alchimista di Stato, un grado equivalente a quello di maggiore e fondi illimitati per le loro ricerche, ma con l\'obbligo di scendere in guerra e di seguire tre regole principali: non trasmutare l\'oro, non effettuare trasmutazioni umane e giurare fedeltà all\'esercito[5].'],
            ['user_id' => '4', 'title' => 'Superman su wikipedia', 'article_text' => 'Superman, il cui nome kryptoniano è Kal-El, mentre il suo nome terrestre è Clark Kent, è un personaggio dei fumetti creato da Jerry Siegel e Joe Shuster nel 1933[3], ma pubblicato dalla DC Comics soltanto nel 1938[4] poiché prima il personaggio aveva una propria testata firmata dagli autori; è il primo supereroe della storia dei fumetti[5] ed è soprannominato anche Man of Steel[4] oppure The Man of Tomorrow[6]. Noto in Italia in passato anche come Ciclone, l\'uomo fenomeno, l’Uomo d\'acciaio e Nembo Kid.[7][8] Un uomo in grado di sollevare un\'auto, con un costume blu addosso e un mantello rosso, contornato da un gruppo di passanti impauriti: è questa la prima immagine di Superman, quella con cui fa il suo esordio nelle edicole statunitensi[9]. Nel 2015, il sito web IGN ha inserito Superman alla prima posizione nella classifica dei cento maggiori eroi della storia dei fumetti prima di Batman.[10] Del personaggio sono state realizzate numerose trasposizioni cinematografiche, televisive, teatrali e radiofoniche.[8] L\'interesse per il personaggio negli anni è rimasto alto tanto che il n. 75 della serie a fumetti nel quale era stato annunciato che il personaggio sarebbe morto, pubblicato nel novembre 1992, ha venduto sei milioni di copie.[11]'],
            ['user_id' => '4', 'title' => 'Iron Man su wikipedia', 'article_text' => 'Iron Man, il cui vero nome è Anthony Edward "Tony" Stark, è un personaggio dei fumetti creato nel 1963 da Stan Lee e Larry Lieber (testi), disegnato da Don Heck e Jack Kirby e pubblicato dalla Marvel Comics. La sua prima apparizione avvenne in Tales of Suspense (vol. 1[1]) n. 39 (marzo 1963), la cui copertina venne disegnata da Kirby, collaboratore di Heck nello sviluppo del design dell\'armatura.[2][3][4][5] Geniale inventore miliardario, playboy e filantropo proprietario delle Stark Industries, Tony viene rapito in Vietnam (Afghanistan dopo la retcon[6]) rimanendo ferito dall\'esplosione di una mina e, anziché costruire armi di distruzione di massa come ordinatogli dai suoi carcerieri, sfrutta il periodo della sua prigionia per costruire un\'armatura che possa salvargli la vita e permettergli di fare ritorno in patria, dove assume l\'identità di Iron Man divenendo un supereroe nonché membro fondatore dei Vendicatori.[4][5][7] Contraddistinto dal carattere carismatico e cordiale risulta tuttavia anche bramoso di potere e spesso disposto a usare sotterfugi, menzogne e inganni (anche ai danni dei propri alleati se lo ritiene necessario), prerogative che lo hanno spesso portato a contrasti con supereroi come l\'Uomo Ragno, Thor e soprattutto Capitan America, noti per la spiccata onestà. Nel 2008 la rivista Forbes lo ha posizionato al settimo posto nella classifica dei personaggi di fantasia più ricchi del mondo, attribuendogli un patrimonio di 7,9 miliardi di dollari[8] che, nel 2013, è stata ricalcolato portandolo a 12,4 miliardi e collocandolo di conseguenza alla quarta posizione della lista.[9] Nella classifica stilata nel 2011 dal sito IGN, si è posizionato al dodicesimo posto come più grande eroe della storia dei fumetti, dopo Dick Grayson e prima di Jean Grey.[10]'],
            ['user_id' => '4', 'title' => 'Dylan Dog su wikipedia', 'article_text' => 'Dylan Dog è un personaggio dei fumetti creato da Tiziano Sclavi ed elaborato graficamente da Claudio Villa, protagonista dell\'omonima serie di genere horror edita dal 1986 dalla Daim Press che poi divenne la Sergio Bonelli Editore.[1] La serie ha raggiunto presto un successo tale da renderlo uno dei fumetti italiani più venduti, oggetto di numerose ristampe[2][3][4][5] e considerato un cult del fumetto italiano[2]. Gli albi della serie a fumetti sono tradotti e pubblicati anche all\'estero[6]. Al personaggio è ispirato un film omonimo del 2010[7]. La gestazione del personaggio iniziò nel 1985 quando Sergio Bonelli, proprietario della casa editrice, e Decio Canzio, suo direttore generale, decisero di tornare a occuparsi di fumetti tradizionali dopo la chiusura dell\'esperienza dei fumetti d\'autore della "Bonelli-Dargaud". Sclavi propose quindi un fumetto horror, provvisoriamente chiamato "Dylan Dog"[8]. Il nome derivava da Dylan Thomas, mentre il cognome dal titolo di un libro di Mickey Spillane che Sclavi vide in una libreria (Dog figlio di) ed era il nome provvisorio che dava ai suoi personaggi in fase di creazione per poi cambiarlo una volta completato; l\'aveva usato anche come titolo di una breve storia della fine degli anni settanta disegnata da Lorenzo Mattotti[8]. Nella prima bozza la nuova serie horror della Bonelli avrebbe dovuto essere ambientata in America, ispirata al genere hard boiled e Dylan avrebbe dovuto essere un detective solitario, senza spalla comica. Si decise di ambientarlo a Londra discutendone con Bonelli perché in America, a New York, c\'era già Martin Mystère e poi l\'Inghilterra sembrava più adatta per l\'horror per via delle sue antiche tradizioni. Per non rendere la serie troppo incentrata sulle indagini si decise di inserire una spalla comica[9]. La serie venne quindi ambientata nella Londra contemporanea e con protagonista un giovane investigatore "dell\'incubo" (l\'idea ha un precedente in John Silence, personaggio dello scrittore inglese Algernon Blackwood[10][11][12]) dall\'età di una trentina d\'anni e, per scelta di Sclavi, con le fattezze ispirate a quelle dell\'attore Rupert Everett. L\'assistente di Dog viene chiamato semplicemente Groucho ed è sosia dell\'attore Groucho Marx, oltre ad avere la caratteristica di fare continuamente battute o raccontare barzellette in qualsiasi situazione[13]. Graficamente il personaggio fu creato da Claudio Villa[13] e Sclavi in proposito racconta: «abbiamo chiamato […] Claudio Villa, e gli abbiamo detto fai delle prove. E lui ha fatto un personaggio che sembrava […] un ballerino spagnolo, […] e dico, no, non ci siamo, non ci siamo... Poi mi è venuto in mente, dico, guarda, ieri sera ho visto un film, che non c\'entra assolutamente niente, Another Country - La scelta. […] Vai, vai al cinema, […] guarda il film, e tira giù quella faccia lì, che secondo me è una faccia interessante. Lui è andato al cinema, […] al buio ha fatto Rupert Everett. […] gli ho detto non farmelo così effeminato: un po\' più "macho". Sebbene l\'equivoco e l\'ambiguità di Rupert Everett, sia rimasta tutta in Dylan Dog»[14]. A fine settembre del 1986 uscì in edicola il primo numero di Dylan Dog[14] ma l\'esordio non fu dei migliori tanto che, citando le parole di Decio Canzio, all\'epoca Direttore responsabile della testata: "Un paio di giorni dopo, il distributore telefonò «L\'albo è morto in edicola, un fiasco». A Sclavi fu tenuta pietosamente nascosta l\'orrenda notizia. Qualche settimana dopo, un\'altra telefonata del distributore «È un boom, praticamente esaurito, forse dovremo ristamparlo»". Tuttavia il vero successo doveva ancora venire"[15]. Infatti nel giro di pochi anni Dylan Dog diventa un best seller che porta Sclavi nel 1990 a vincere il premio Yellow Kid come miglior autore[16]. Il 1991 è probabilmente il momento di maggior successo per la serie che, con il n. 69 "Caccia alle streghe", arriva a superare Tex per numero di copie vendute[15].'],
            ['user_id' => '4', 'title' => 'Topolino su wikipedia', 'article_text' => 'Topolino è il nome di due diverse testate a fumetti pubblicate in Italia: la prima, in formato giornale (pubblicata dal 1932 al 1949)[1] e la seconda, in formato "libretto" e in sostituzione della prima, dal 1949[2], e così intitolate perché incentrate sul personaggio dei fumetti di Mickey Mouse noto in Italia come Topolino[3]. Il personaggio in Italia esordì nel 1930 sull\'Illustrazione del Popolo, supplemento della Gazzetta del popolo ma la prima testata omonima arriverà alla fine del 1932 con il settimanale Topolino edito inizialmente dalla Casa Editrice Nerbini[4][1] e poi dalla Arnoldo Mondadori Editore[1]. Successivamente questa testata venne chiusa e nel 1949 la Mondadori ne fece esordire un\'altra omonima ma di diverso formato che, dopo cambi di editore[5], è ancora in corso di pubblicazione dopo aver superato i 3000 numeri[6].']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
