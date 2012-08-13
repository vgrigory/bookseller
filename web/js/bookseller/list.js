$(document).ready(function() {

    var grid = $("#result_list");
    grid.jqGrid({
        url:'listAjax',
        datatype: "json",
        colNames: ['id', 'title', 'publisher', 'price', 'bookseller', 'rebate'],
        colModel: [
        {name:'id', index:'id', width:55},
        {name:'title', index:'title', width:55},
        {name:'publisher', index:'publisher', width:90},
        {name:'price', index:'price', width:100},
        {name:'bookseller', index:'bookseller', width:80},
        {name:'rebate', index:'rebate', width:80}
        ],
        rowNum:5,
        rowList:[10,20,30],
        pager: '#result_list_pager',
        sortname: 'title',
        viewrecords: true,
        sortorder: "desc"
    });

    grid.jqGrid('navGrid','#result_list_pager',{
        edit:false,
        add:false,
        del:false,
        search:false
    });

    $('#bookseller_id').keyup(function(evt){

        requestData(evt);
    });

    $('#entity_type').change(function(evt){

        requestData(evt);
    });

    function requestData(evt){

        var type = $('#entity_type').val();
        var booksellerId = $('#bookseller_id').val();

        grid.setGridParam({
            url: 'listAjax?id='+booksellerId+"&type="+type
        });
        switch(type){
            case 'book':
                grid.setCaption("Books of #"+booksellerId+" bookseller");
                grid.setGridParam({
                    colNames: ['id', 'title', 'publisher', 'price', 'bookseller', 'rebate'],
                    colModel: [
                        {name:'id', index:'id', width:55},
                        {name:'title', index:'title', width:55},
                        {name:'publisher', index:'publisher', width:90},
                        {name:'price', index:'price', width:100},
                        {name:'bookseller', index:'bookseller', width:80},
                        {name:'rebate', index:'rebate', width:80}
                    ]
                });
                break;
            case 'magazine':
                console.log('akajahat');
                grid.setCaption("Magazines of #"+booksellerId+" bookseller");
                grid.setGridParam({
                    colNames: ['id', 'title', 'pub. date', 'price', 'bookseller', 'sold out', 'can be reordered', 'rebate'],
                    colModel: [
                        {name:'id', index:'id', width:55},
                        {name:'title', index:'title', width:55},
                        {name:'pub. date', index:'pubdate', width:110},
                        {name:'price', index:'price', width:100},
                        {name:'bookseller', index:'bookseller', width:80},
                        {name:'sold out', index:'sold_out', width:120},
                        {name:'can be reordered', index:'can_be_reordered', width:120},
                        {name:'rebate', index:'rebate', width:80}
                    ]
                });
                break;
            default:
                grid.setCaption("Books of #"+booksellerId+" bookseller");
                grid.setGridParam({
                    colNames: ['id', 'title', 'publisher', 'price', 'bookseller', 'rebate'],
                    colModel: [
                        {name:'id', index:'id', width:55},
                        {name:'title', index:'title', width:55},
                        {name:'publisher', index:'publisher', width:90},
                        {name:'price', index:'price', width:100},
                        {name:'bookseller', index:'bookseller', width:80},
                        {name:'rebate', index:'rebate', width:80}
                    ]
                });
                break;
        }

        grid.trigger("reloadGrid");
    }
});