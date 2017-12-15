<br />
<form method="post" action="{{url('paslon')}}" enctype="multipart/form-data">
 <div class="form-group">
   {{ csrf_field() }}
   <label for="nketua">Nama Ketua:</label>
   <input type="text" class="form-control" id="nketua" name="nketua">
   <input type="hidden" class="form-control" id="nketua" name="organisasi" value="sema">
 </div>
 <div class="form-group">
   <label for="nkwetua">Nama Wakil Ketua:</label>
   <input type="text" class="form-control" id="nwketua" name="nwketua">
 </div>
 <div class="form-group">
   <label for="nimketua">NIM Ketua:</label>
   <input id="nimketua" name="nimketua" type="text" class="form-control">
 </div>
 <div class="form-group">
   <label for="nimwketua">NIM Wakil Ketua:</label>
   <input id="nimwketua" name="nimwketua" type="text" class="form-control">
 </div>
 <div class="form-group">
   <label for="fotoketua">Foto Ketua:</label>
   <input id="fotoketua" name="fotoketua" type="file" class="file">
 </div>
 <div class="form-group">
   <label for="fotowketua">Foto Wakil Ketua:</label>
   <input id="fotowketua" name="fotowketua" type="file" class="file">
 </div>
 <div class="form-group form-group-lg">
   <label for="visi">Visi:</label>
   <textarea name="visi" id="editor"></textarea>
 </div>
 <div class="form-group form-group-lg">
   <label for="misi">Misi:</label>
   <textarea name="misi" id="editor1"></textarea>
 </div>

 <div class="form-check">
   <label class="form-check-label">

   </label>
 </div>
 <button type="submit" class="btn btn-primary center-block">Simpan</button>
</form>
