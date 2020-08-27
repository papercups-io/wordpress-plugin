(function ($) {
  'use strict';

  function initPapercupsWidget() {
    window.Papercups = {
      config: {
        accountId: papercupsVars.accountId,
        title: papercupsVars.title,
        subtitle: papercupsVars.subtitle,
        newMessagePlaceholder: papercupsVars.newMessagePlaceholder,
        primaryColor: papercupsVars.primaryColor,
        greeting: papercupsVars.greeting,
        baseUrl: papercupsVars.baseUrl,
        requireEmailUpfront: papercupsVars.requireEmailUpfront,
      },
    };
  }

  if (papercupsVars.accountId.length > 0) {
    $(window).ready(initPapercupsWidget);
  } else {
    console.warn('Papercups account id must be set!');
  }
})(jQuery);
