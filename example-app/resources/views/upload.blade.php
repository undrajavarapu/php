<h1>

Upload
</h1>


        <form action="upload" method="POST" enctype="multipart/form-data" >
          @csrf
  <select name="filetype" id="filetype">
    <option value="0" hidden>--- Choose a filetype ---</option>
    <option value="1">W2</option>
    <option value="2">Tax Organiser</option>
    <option value="3">Xls</option>
</select>
    <input type="file" name="file">
    <button type="submit">upload</button>






</form>

 
