<x-app-layout>
    

    
        <x-slot name="header">
        
            {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Service Tickets') }}
            </h2> --}}
        </x-slot>
        <div class="col-lg-12 margin-tb">
           
            
            
        </div>
    

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    
  


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="pull-right">
                    <form action="/addticket" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <label for="service" >service</label>
                        <input type="text" name="service">
                        <label for="Description" >Description</label> 
                        <input type="text" name="description">
                        <label for="taxyear" >taxyear</label>--}}
                        <!--<select name="taxyearid" id="taxyearid">
                            <option value="1">--- Choose a Taxyear ---</option>
                            <option value="2">2012</option>
                            <option value="3">2013</option>
                            <option value="4">2014</option>
                        </select>-->
                        <select id='serviceid' name='serviceid' >
                            <option value='' selected hidden>-- Select Service --</option>
                      
                            <!-- Read Departments -->
                            @foreach($services as $service)
                              <option value='{{ $service->id }}'>{{ $service->service }}</option>
                            @endforeach
                      
                         </select>
                       
                    
                    <button type="submit"  class="btn btn-primary">+</button>
                    
                    
                    
                    </form>
                </div>
                    <table class="table" border="1" id="uptable">
                        <tr>
                            <th>#</th>
                            <th>created user</th>
                            <th>service</th>
                            
                            <th>W2</th>
                            <th>Taxorganiser</th>
                            <th>Status</th>
                            {{-- <th>Upload</th>
                            <th>Download</th>
                            <th>Pay</th> --}}
                            </tr>
                        @foreach ($tickets as $ticket)
                        <tr>
                            <td>{{$ticket['id']}}</td>
                            <td>{{$ticket->name}}</td>
                            <td>{{$ticket->service}}</td>
                            
                            <td data-toggle="modal" data-id="3" data-target="#orderModal">W2</td>
                            <td>Taxorganiser</td>
                            <td>Status</td>
                            <td  ><button type="button" class="btn btn-info" data-toggle="modal" data-target="#orderModal">
                                Upload
                           </button></td>
                           <td  ><button type="button" class="btn btn-info" data-toggle="modal" data-target="#orderModal">
                            Download
                       </button></td>
                            <td  ><button type="button" class="btn btn-info" data-toggle="modal" data-target="#orderModal">
                                Pay
                           </button></td>
                            </tr>
                         
                        @endforeach
                    </table>
                {{-- <span >{{$tickets->skip()}}</span>  --}}
                
            </div>
            <div class="modal fade" id="orderModal" role="dialog">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                      {{-- <p>This is a small modal.</p> --}}
                      <input type="hidden" name="hiddenValue" id="hiddenValue" value="" />
                      @include('upload')
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
        </div>
    </div>

    
</div>


  
</x-app-layout>
<script>
    
    var table = document.getElementById('uptable');
    
    for(var i = 1; i < table.rows.length; i++)
    {
        table.rows[i].onclick = function()
        {
             //rIndex = this.rowIndex;
             console.log(this.cells[0].innerHTML) ;
             document.getElementById("hiddenValue").value=this.cells[0].innerHTML;
            
        };
    }

</script>