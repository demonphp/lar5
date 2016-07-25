<div class="pageContent">
    <div class="pageFormContent" layoutH="58" id="tree">
    </div>
    <div class="formBar">
        <ul>
            <li><div class="button"><div class="buttonContent"><button class="close" type="button">关闭</button></div></div></li>
        </ul>
    </div>
</div>
<div id="test"  str="{{$data}}"></div>
<script>
    var json = $.parseJSON($('#test').attr('str'));
    $(document).ready(function(){
        function createTree(data, html)
        {
            $.each(data, function(key, value){
                var $a =  $("<a href='javascript:' onclick='$.bringBack({pid:1, catetName:" + value.id + "})'>"+ value.name+"</a>");
                var $li = $('<li></li>');
                $li.append($a);
                if(value.children != 'undefined')
                {
                    var $ul = $('<ul></ul>');
                    $a.after($ul);
                    createTree(value.children, $ul);
                }
                html.append($li);
            })
        }

        var tree = $('<ul class="tree expand"></ul>');
        createTree(json,tree);
        $('#tree').html(tree);
    });
</script>

