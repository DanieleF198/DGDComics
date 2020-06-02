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
            $table->timestamp('date')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });
        DB::table('articles')->insert([
            ['user_id' => '4', 'title' => 'Buongiorno', 'article_text' => 'Brotherhood 1' ],
            ['user_id' => '4', 'title' => 'FMA su wikipedia', 'article_text' => 'Fullmetal Alchemist (鋼の錬金術師 Hagane no renkinjutsushi?, lett. "L\'alchimista d\'acciaio") è un manga scritto e disegnato da Hiromu Arakawa. L\'opera è stata serializzata sulla rivista di Square Enix Monthly Shōnen Gangan dal 12 luglio 2001 al 12 giugno 2010 per un totale di 108 capitoli più un capitolo speciale; questi sono in seguito stati raccolti in 27 volumi sotto l\'etichetta Gangan Comics e pubblicati tra il 22 gennaio 2002 e il 22 novembre 2010. Il manga è stato tradotto in diverse lingue, tra cui in italiano da Planet Manga, in inglese da Viz Media, in francese da Kurokawa, in spagnolo da Norma Editorial e in coreano da Haksan Publishing. La storia segue i giovani alchimisti Edward e Alphonse Elric, due fratelli in viaggio per la nazione di Amestris alla ricerca della leggendaria pietra filosofale con lo scopo di riottenere i loro corpi originari persi in una trasmutazione umana finita male. Durante il loro viaggio scopriranno un piano orchestrato da sette esseri chiamati homunculus che potrebbe distruggere il Paese se non fermati in tempo. Dal manga sono state tratte due serie televisive anime prodotte dallo studio d\'animazione Bones: Fullmetal Alchemist (鋼の錬金術師 Hagane no renkinjutsushi?) conta 51 episodi, trasmessi tra il 2003 ed il 2004, e traspone fedelmente il manga solo per i primi volumi, narrando poi una storia originale; Fullmetal Alchemist: Brotherhood (鋼の錬金術師 FULLMETAL ALCHEMIST Hagane no renkinjutsushi - FULLMETAL ALCHEMIST?), è un adattamento fedele del manga in 64 episodi, mandati in onda tra il 2009 ed il 2010. La serie ha avuto un enorme successo, generando anche altri adattamenti, tra cui film animati, romanzi e videogiochi. L\'universo di Fullmetal Alchemist, ambientato nei primi anni del 1900[1], diverge dal nostro principalmente per la presenza dell\'alchimia: questa è una scienza che utilizza l\'energia scaturita dai movimenti della crosta terrestre[1] e la incanala tramite un cerchio alchemico per compiere un processo chiamato trasmutazione, ovvero la modifica delle proprietà di un oggetto. La trasmutazione si divide in tre fasi principali: la comprensione della struttura della materia, la scomposizione e la ricomposizione[2]. Inoltre l\'alchimia è governata da una legge che si pone come caposaldo di questa scienza: il principio dello scambio equivalente, il quale impone che, durante una trasmutazione, la massa dell\'oggetto di base e quello trasmutato debbano essere identici, così come le proprietà dei due oggetti[3]. Coloro che riescono ad utilizzare l\'alchimia assumono la denominazione di alchimisti. La nazione in cui si svolgono le vicende è Amestris, un Paese governato da un regime militare il cui capo è chiamato "comandante supremo"[4]; la vocazione militaristica di Amestris si rivela anche nel fatto che la nazione è periodicamente in guerra con diversi Stati confinanti ed è stata teatro di una sanguinosa guerra civile[1]. Il Paese viene diviso essenzialmente in cinque regioni, ognuna corrispondente ad un punto cardinale più il centro, che ospita la capitale Central City. Oltre che ai soldati, i quali sono divisi in gradi da recluta a generale, l\'ingresso nell\'esercito è aperto anche agli alchimisti che, dopo aver superato un test, ottengono il titolo di alchimista di Stato, un grado equivalente a quello di maggiore e fondi illimitati per le loro ricerche, ma con l\'obbligo di scendere in guerra e di seguire tre regole principali: non trasmutare l\'oro, non effettuare trasmutazioni umane e giurare fedeltà all\'esercito[5].']
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
