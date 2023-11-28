<?php 
use App\Models\ProductsFilter;
$productFilters = ProductsFilter::productFilters(); 
// dd($productFilters);
?>
<script>
    $(document).ready(function(){
        //Sort by Filter
        $("#sort").on("change", function(){
            // this.form.submit();
            var price = get_filter('price');
            var brand = get_filter('brand');
            var color = get_filter('color');
            var size = get_filter('size');
            var sort = $("#sort").val();
            var url = $("#url").val();
            @foreach($productFilters as $filters)
                var {{$filters['filter_column']}} = get_filter('{{$filters['filter_column']}}');
            @endforeach
            // alert(url); return false;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:url,
                method:'Post',
                data:{
                    @foreach($productFilters as $filters)
                        {{$filters['filter_column']}}:{{$filters['filter_column']}},
                    @endforeach
                url:url,sort:sort,size:size,color:color,price:price,brand:brand},
                success:function(data){
                    $('.filter_products').html(data);
                },
                error:function(){
                    alert("Error");
                }
            });
        });

        //Sort by size
        $(".size").on("change", function(){
            // this.form.submit();
            var price = get_filter('price');
            var brand = get_filter('brand');
            var color = get_filter('color');
            var size = get_filter('size');
            var sort = $("#sort").val();
            var url = $("#url").val();
            @foreach($productFilters as $filters)
                var {{$filters['filter_column']}} = get_filter('{{$filters['filter_column']}}');
            @endforeach
            // alert(url); return false;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:url,
                method:'Post',
                data:{
                    @foreach($productFilters as $filters)
                        {{$filters['filter_column']}}:{{$filters['filter_column']}},
                    @endforeach
                url:url,sort:sort,size:size,color:color,price:price,brand:brand},
                success:function(data){
                    $('.filter_products').html(data);
                },
                error:function(){
                    alert("Error");
                }
            });
        });

        //Sort by color
        $(".color").on("change", function(){
            // this.form.submit();
            var color = get_filter('color');
            var brand = get_filter('brand');
            var price = get_filter('price');
            var size = get_filter('size');
            var sort = $("#sort").val();
            var url = $("#url").val();
            @foreach($productFilters as $filters)
                var {{$filters['filter_column']}} = get_filter('{{$filters['filter_column']}}');
            @endforeach
            // alert(url); return false;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:url,
                method:'Post',
                data:{
                    @foreach($productFilters as $filters)
                        {{$filters['filter_column']}}:{{$filters['filter_column']}},
                    @endforeach
                url:url,sort:sort,size:size,color:color,price:price,brand:brand},
                success:function(data){
                    $('.filter_products').html(data);
                },
                error:function(){
                    alert("Error");
                }
            });
        });

        //Sort by Price
        $(".price").on("change", function(){
            // this.form.submit();
            var color = get_filter('color');
            var brand = get_filter('brand');
            var price = get_filter('price');
            var size = get_filter('size');
            var sort = $("#sort").val();
            var url = $("#url").val();
            @foreach($productFilters as $filters)
                var {{$filters['filter_column']}} = get_filter('{{$filters['filter_column']}}');
            @endforeach
            // alert(url); return false;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:url,
                method:'Post',
                data:{
                    @foreach($productFilters as $filters)
                        {{$filters['filter_column']}}:{{$filters['filter_column']}},
                    @endforeach
                url:url,sort:sort,size:size,color:color,price:price,brand:brand},
                success:function(data){
                    $('.filter_products').html(data);
                },
                error:function(){
                    alert("Error");
                }
            });
        });

        //Sort by brand
        $(".brand").on("change", function(){
            // this.form.submit();
            var color = get_filter('color');
            var brand = get_filter('brand');
            var price = get_filter('price');
            var size = get_filter('size');
            var sort = $("#sort").val();
            var url = $("#url").val();
            @foreach($productFilters as $filters)
                var {{$filters['filter_column']}} = get_filter('{{$filters['filter_column']}}');
            @endforeach
            // alert(url); return false;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:url,
                method:'Post',
                data:{
                    @foreach($productFilters as $filters)
                        {{$filters['filter_column']}}:{{$filters['filter_column']}},
                    @endforeach
                url:url,sort:sort,size:size,color:color,price:price,brand:brand},
                success:function(data){
                    $('.filter_products').html(data);
                },
                error:function(){
                    alert("Error");
                }
            });
        });
    });

    //dynamic filters
    @foreach($productFilters as $filter)
        $('.{{$filter['filter_column']}}').on('click',function(){
            var color = get_filter('color');
            var brand = get_filter('brand');
            var price = get_filter('price');
            var size = get_filter('size');
            var url = $("#url").val();
            var sort = $("#sort option:selected").val();
            @foreach($productFilters as $filters)
                var {{$filters['filter_column']}} = get_filter('{{$filters['filter_column']}}');
            @endforeach
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:url,
                method:"Post",
                data:{
                    @foreach($productFilters as $filters)
                        {{$filters['filter_column']}}:{{$filters['filter_column']}},
                    @endforeach
                url:url,sort:sort,color:color,size:size,price:price,brand:brand},
                success:function(data){
                    $('.filter_products').html(data);
                },
                error:function(){
                    alert("Error");
                }
            });
        });
    @endforeach
</script>