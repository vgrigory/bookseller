$(document).ready(function() {

    var bookColNames = ['id', 'title', 'publisher', 'price', 'bookseller', 'rebate'];
    var bookColModel = [
        {name:'id', index:'id', width:55},
        {name:'title', index:'title', width:55},
        {name:'publisher', index:'publisher', width:90},
        {name:'price', index:'price', width:100},
        {name:'bookseller', index:'bookseller', width:80},
        {name:'rebate', index:'rebate', width:80}
        ];
    var magazineColNames = ['id', 'title', 'pub. date', 'price', 'bookseller', 'sold out', 'can be reordered', 'rebate'];
    var magazineColModel = [
                        {name:'id', index:'id', width:55},
                        {name:'title', index:'title', width:85},
                        {name:'pub. date', index:'pubdate', width:110},
                        {name:'price', index:'price', width:100},
                        {name:'bookseller', index:'bookseller', width:80},
                        {name:'sold out', index:'sold_out', width:120},
                        {name:'can be reordered', index:'can_be_reordered', width:120},
                        {name:'rebate', index:'rebate', width:80}
                    ];

    // init book grid
    createGrid(bookColNames, bookColModel);

    $('#bookseller_id').keyup(function(evt){

        requestData();
    });

    $('#entity_type').change(function(evt){

        var type = $('#entity_type').val();

        $("#result_list").jqGrid('GridUnload');

        switch(type){
            case 'book':
                createGrid(bookColNames, bookColModel);
                break;
            case 'magazine':
                createGrid(magazineColNames, magazineColModel);
                break;
            default:
                createGrid(bookColNames, bookColModel);
                break;
        }
    });

    function requestData(){

        var type = $('#entity_type').val();
        var booksellerId = $('#bookseller_id').val();

        var grid = $("#result_list");
        grid.setGridParam({
            url: 'listAjax?id='+booksellerId+"&type="+type
        });

        switch(type){
            case 'book':
                grid.setCaption("Books of #"+booksellerId+" bookseller");
                break;
            case 'magazine':
                grid.setCaption("Magazines of #"+booksellerId+" bookseller");
                break;
            default:
                grid.setCaption("Books of #"+booksellerId+" bookseller");
                break;
        }

        grid.trigger("reloadGrid");
    }

    function createGrid(colNames, colModel){

        var type = $('#entity_type').val();
        var booksellerId = $('#bookseller_id').val();

        var grid = $("#result_list");
        grid.jqGrid({
            url: 'listAjax?id='+booksellerId+"&type="+type,
            datatype: "json",
            colNames: colNames,
            colModel: colModel,
            sortable: false,
            height: 240,
            altRows: true
        });

        switch(type){
            case 'book':
                grid.setCaption("Books of #"+booksellerId+" bookseller");
                break;
            case 'magazine':
                grid.setCaption("Magazines of #"+booksellerId+" bookseller");
                break;
            default:
                grid.setCaption("Books of #"+booksellerId+" bookseller");
                break;
        }

        grid.trigger("reloadGrid");
    }
});