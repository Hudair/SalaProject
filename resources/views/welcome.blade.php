<h3>البطاقات التي تم ربطها</h3>
<table class="table table-striped table-inverse " style="max-width: 100%">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>الصوره</th>
            <th>الاسم</th>
            <th>السعر</th>
            <th>بطاقاتي</th>


        </tr>
    </thead>
    <tbody>
        @php
            $i=0;
        @endphp
        @forelse ($Products as $Product)
            <tr>
                <td><td>{{ $i++; }}</td></td>
                <td> <img src="{{ $Product->image }}" widtd="50px" height="50px" alt="">
                </td>
                <td>{{ $Product->name }}</td>
                <td>{{ $Product->price }}</td>
                <td>
                    @php
                    $x;
                    try {
                        $botagate_product_code = App\Models\PointOfSaleEqualSalaProduct::get()
                            ->where('sala_product_id', $Product->product_id)
                            ->first()->botagate_product_code;

                            $botagate_product = App\Models\PosProducts::get()
                            ->where('product_code', $botagate_product_code)
                            ->first();
                    } catch (Exception $e) {
                        $x = 0;
                    }
                    
                @endphp
               {{  $botagate_product->name->ar}}

            </td>

        </tr>
    @empty
        <tr>
            <td> لا توجد بيانات لعرضها</td>
        </tr>

    @endforelse

    

</tbody>
<tfoot>
    <tr>
        <th>#</th>
        <th>الصوره</th>
            <th>الاسم</th>
            <th>السعر</th>
            <th>بطاقاتي</th>
    </tr>
</tfoot>
</table>


<h3>البطاقات التي الغير  موجوده لدى المزود</h3>
<table class="table table-striped table-inverse " style="max-width: 100%">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>الصوره</th>
            <th>الاسم</th>
            <th>السعر</th>
          
        </tr>
    </thead>
    <tbody>

        @php
            $i=0;
        @endphp
        @forelse ($notFoundProducts as $Product)


            <tr>
            <td>{{ $i++; }}</td>

                <td> <img src="{{ $Product->image }}" widtd="50px" height="50px" alt="">
                </td>
                <td>{{ $Product->name }}</td>
                <td>{{ $Product->price }}</td>
                

        </tr>
    @empty
        <tr>
            <td> لا توجد بيانات لعرضها</td>
        </tr>

    @endforelse

    

</tbody>
<tfoot>
    <tr>
        <th>#</th>
        <th>الصوره</th>
        <th>الاسم</th>
        <th>السعر</th>

           
    </tr>
</tfoot>
</table>

