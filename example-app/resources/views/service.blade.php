<x-app-layout>
 {{--    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Service') }}
        </h2>
    </x-slot> --}}


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="/addservice" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="service" >service</label>
                    <input type="text" name="service">
                    <label for="Description" >Description</label>
                    <input type="text" name="description">
                    <label for="taxyear" >taxyear</label>
                    <!--<select name="taxyearid" id="taxyearid">
                        <option value="1">--- Choose a Taxyear ---</option>
                        <option value="2">2012</option>
                        <option value="3">2013</option>
                        <option value="4">2014</option>
                    </select>-->
                    <select id='taxyearid' name='taxyearid'>
                        <option value='0'>-- Select taxyear --</option>
                  
                        <!-- Read Departments -->
                        @foreach($taxyears as $taxyear)
                          <option value='{{ $taxyear->id }}'>{{ $taxyear->taxyear }}</option>
                        @endforeach
                  
                     </select>
                <button type="submit">Save!</button>
                
                </form>
                    <table class="table" border="1">
                        <tr>
                            <th>id</th>
                            <th>service</th>
                            <th>taxyearid</th>
                             
                            </tr>
                        @foreach ($services as $service)
                        <tr>
                            <td>{{$service['id']}}</td>
                            <td>{{$service['service']}}</td>
                            <td>{{$service['taxyearid']}}</td>
                          
                      
                      
                            </tr>
                         
                        @endforeach
                    </table>
                <span >{{$services->links()}}</span>
                
            </div>

        </div>
    </div>
</div>



</x-app-layout>