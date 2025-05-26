<html>
  <head>
  </head>
  <style>
  body {
    font-family: 'Montserrat', sans-serif;
    font-size: 15px;
  }
  </style>
  <script>
  window.onload = function () {
    const month = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
    const today = new Date();
    const dd = today.getDate();
    const mm = today.getMonth();
    const yyyy = today.getFullYear();
    const hh = String(today.getHours()).padStart(2, '0');
    const min = String(today.getMinutes()).padStart(2, '0');
    document.getElementById('date').value = dd + '.' + month[mm] + '.' + yyyy;
    document.getElementById('time').value = hh + ':' + min;
  };

  function buildSBBUrl(lang) {
    const from = document.getElementById('from').value;
    const to = document.getElementById('to').value;
    const date = document.getElementById('date').value;
    const time = document.getElementById('time').value;
    const arrival = document.getElementById('arrival').checked ? 'true' : 'false';
    const base = {
      de: 'https://www.sbb.ch/de/kaufen/pages/fahrplan/fahrplan.xhtml',
      en: 'https://www.sbb.ch/en/buying/pages/fahrplan/fahrplan.xhtml',
      fr: 'https://www.sbb.ch/fr/acheter/pages/fahrplan/fahrplan.xhtml'
    };
    const url = `${base[lang]}?von=${from}&nach=${to}&datum=${date}&zeit=${time}&an=${arrival}&suche=true`;
    window.open(url, '_blank');
  }

  function callSBB() { buildSBBUrl('de'); }
  function callSBB_en() { buildSBBUrl('en'); }
  function callSBB_fr() { buildSBBUrl('fr'); }
  </script>

  <body>
    <div class="w-full px-4 py-8 space-y-8">

      <!-- Logo Row -->
      <div class="w-full flex justify-start">
          <img 
              alt="sbb logo" 
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sbb_extension.svg" 
              class="w-full max-w-[272px]"
          >
      </div>

      <!-- Form Row -->
      <form 
          onsubmit="<?php 
              if(ICL_LANGUAGE_CODE=='de'): ?>callSBB()<?php 
              elseif(ICL_LANGUAGE_CODE=='en'): ?>callSBB_en()<?php 
              elseif(ICL_LANGUAGE_CODE=='fr'): ?>callSBB_fr()<?php 
              endif; ?>" 
          action="#" 
          id="sbbapp" 
          class="w-full max-w-4xl space-y-6"
      >

        <!-- FROM + TO -->
        <div class="flex flex-col lg:flex-row gap-4">
            <div class="flex items-center border-b border-black w-full">
                <label class="text-black pr-3 whitespace-nowrap text-left">
                    <?php echo ICL_LANGUAGE_CODE === 'de' ? 'Von:' : (ICL_LANGUAGE_CODE === 'fr' ? 'De:' : 'From:'); ?>
                </label>
                <input id="from" name="from" type="text" placeholder="<?php echo ICL_LANGUAGE_CODE === 'de' ? 'Ort' : (ICL_LANGUAGE_CODE === 'fr' ? 'Emplacement' : 'Location'); ?>" class="bg-transparent border-none focus:outline-none text-[18px] font-thin w-full">
            </div>
            <div class="flex items-center border-b border-black w-full">
                <label class="text-black pr-3 whitespace-nowrap text-left">
                    <?php echo ICL_LANGUAGE_CODE === 'de' ? 'Nach:' : (ICL_LANGUAGE_CODE === 'fr' ? 'À:' : 'To:'); ?>
                </label>
                <input id="to" name="to" type="text" value="Basel SBB" class="bg-transparent border-none focus:outline-none text-[18px] font-thin w-full">
            </div>
        </div>

        <!-- DATE + TIME -->
        <div class="flex flex-col lg:flex-row gap-4">
            <div class="flex items-center border-b border-black w-full">
                <label class="text-black pr-3 whitespace-nowrap text-left">
                    <?php echo ICL_LANGUAGE_CODE === 'de' ? 'Datum:' : 'Date:'; ?>
                </label>
                <input id="date" name="date" type="text" class="bg-transparent border-none focus:outline-none text-[18px] font-thin w-full">
            </div>
            <div class="flex items-center border-b border-black w-full">
                <label class="text-black pr-3 whitespace-nowrap text-left">
                    <?php echo ICL_LANGUAGE_CODE === 'de' ? 'Zeit:' : (ICL_LANGUAGE_CODE === 'fr' ? 'Heure:' : 'Time:'); ?>
                </label>
                <input id="time" name="time" type="text" class="bg-transparent border-none focus:outline-none text-[18px] font-thin w-full">
            </div>
        </div>

        <!-- RADIO BUTTONS -->
        <div class="flex gap-6 pt-2">
            <div class="flex items-center">
                <input type="radio" id="departure" name="isArrival" value="false" checked class="accent-black">
                <label for="departure" class="pl-2 text-left">
                    <?php echo ICL_LANGUAGE_CODE === 'de' ? 'Abfahrt' : (ICL_LANGUAGE_CODE === 'fr' ? 'Départ' : 'Departure'); ?>
                </label>
            </div>
            <div class="flex items-center">
                <input type="radio" id="arrival" name="isArrival" value="true" class="accent-black">
                <label for="arrival" class="pl-2 text-left">
                    <?php echo ICL_LANGUAGE_CODE === 'de' ? 'Ankunft' : (ICL_LANGUAGE_CODE === 'fr' ? 'Arrivée' : 'Arrival'); ?>
                </label>
            </div>
        </div>

        <!-- SUBMIT BUTTON -->
        <div class="flex justify-end pt-4">
            <input type="submit" value="<?php echo ICL_LANGUAGE_CODE === 'de' ? 'Verbindung suchen' : (ICL_LANGUAGE_CODE === 'fr' ? 'Rechercher' : 'Search for connection'); ?>" class="bg-red-600 text-white font-bold px-6 py-2 text-sm border border-transparent hover:bg-red-700 cursor-pointer">
        </div>
      </form>
    </div>

  </body>
</html>