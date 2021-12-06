<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Taxyears') }}
        </h2>
    </x-slot>


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="/addtaxyear" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="taxyear" >taxyear</label>
                    <input type="text" name="taxyear">
                   
                
                <button type="submit">Save!</button>
                
                </form>
                    <table class="table" border="1">
                        <tr>
                            <td>id</td>
                            <td>taxyear</td>
                             
                            </tr>
                        @foreach ($taxyears as $taxyear)
                        <tr>
                            <td>{{$taxyear['id']}}</td>
                            <td>{{$taxyear['taxyear']}}</td>
                            
                            </tr>
                         
                        @endforeach
                    </table>
                <span >{{$taxyears->links()}}</span>
                
            </div>
        </div>
    </div>
</div>



</x-app-layout>