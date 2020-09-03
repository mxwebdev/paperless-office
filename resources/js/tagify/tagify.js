import Tagify from '@yaireo/tagify';

var keywordsWhitelist = [];

for (var i = 0; i < keywords.length; i++) {
    keywordsWhitelist.push(keywords[i]['name']);
}

var input = document.getElementById('keyword-input'),

    tagify = new Tagify(input, {
        whitelist: keywordsWhitelist,
        dropdown: {
            enabled: 0,              // show the dropdown immediately on focus
            maxItems: 10,
            position: "text",         // place the dropdown near the typed text
            closeOnSelect: false,          // keep the dropdown open after selecting a suggestion
            highlightFirst: true
        }
    });