<div>
    <!--reservations-->
    <!---payment histroy-->
<div class="container-fluid payments">
    <div class="row justify-content-center flex-wrap p-4" style="border:0px solid green;margin-top:50px">
      <section class="col-md-5">
         <h3 class="fw-bold pt-3">Your Reservations</h3>
         <p class="text-muted">Here are persons that have booked your listed property.</p>
      </section>
      <section class="col-md-7 p-3">
       <aside class="d-flex float-end text-center p-3" style="width:100%;overflow-x:auto;border:0px solid green;">
           <button>All</button>
           <button>Ongoing</button>
           <button>Saved</button>
           <button>Completed</button>
           <button>Cancelled</button>
       </aside>
      </section>
  <section class="col-md-12 px-3 mt-3">
    <div class="input-group pull-right mb-3">
       <span class="input-group-text" id="basic-addon1">
         <i class="bi bi-search"></i>
       </span>
       <input type="text" id="filterInput" class="search form-control shadow-none" placeholder="Search Reservations...">
   </div>
   <div class="table-responsive">
    <table class="table custom-table" id="myTable" cellspacing="10">
     <thead>
         <tr style="white-space:nowrap;">
         <th scope="col">S/N</th>
         <th scope="col">Listing</th>
         <th scope="col">Status</th>
         <th scope="col">Bedroom</th>
         <th scope="col">Beds</th>
         <th scope="col"></th>
         </tr>
       </thead>
             <tbody style="white-space:nowrap;">
             <tr>
                 <td>
                   1
                 </td>
                 <td>
                  <b class="fw-bold">Luxury Lakehouse</b>
                  <p>Nkaliki,Abakaliki</p>
                 </td>
                 <td>Listed</td>
                 <td>10</td>
                 <td>2</td>
                 <td><i class="bi bi-three-dots-vertical"></i></td>
               </tr>
                <tr>
                 <td>
                   1
                 </td>
                 <td>
                  <b class="fw-bold">Luxury Lakehouse</b>
                  <p>Nkaliki,Abakaliki</p>
                 </td>
                 <td>Listed</td>
                 <td>10</td>
                 <td>2</td>
                 <td><i class="bi bi-three-dots-vertical"></i></td>
               </tr>
               <tr>
                 <td>
                   1
                 </td>
                 <td>
                  <b class="fw-bold">Luxury Lakehouse</b>
                  <p>Nkaliki,Abakaliki</p>
                 </td>
                 <td>Listed</td>
                 <td>10</td>
                 <td>2</td>
                 <td><i class="bi bi-three-dots-vertical"></i></td>
               </tr>
               <tr>
                 <td>
                   1
                 </td>
                 <td>
                  <b class="fw-bold">Luxury Lakehouse</b>
                  <p>Nkaliki,Abakaliki</p>
                 </td>
                 <td>Listed</td>
                 <td>10</td>
                 <td>2</td>
                 <td><i class="bi bi-three-dots-vertical"></i></td>
               </tr>
               <tr>
                 <td>
                   1
                 </td>
                 <td>
                  <b class="fw-bold">Luxury Lakehouse</b>
                  <p>Nkaliki,Abakaliki</p>
                 </td>
                 <td>Listed</td>
                 <td>10</td>
                 <td>2</td>
                 <td><i class="bi bi-three-dots-vertical"></i></td>
               </tr>
             </tbody>
           </table>
      </section>
    </div>
 
    <script>
     $(document).ready(function () {
 
         $('#myTable').DataTable({
                 paging: true,
                 searching: false
             });
 
         function filterTable() {
             var input, filter, table, tr, td, i, j, txtValue;
             input = $("#filterInput");
             filter = input.val().toUpperCase();
             table = $("#myTable");
             tr = table.find("tr:gt(0)").toArray();
 
             // Loop through all table rows, hide those that don't match the filter
             for (i = 0; i < tr.length; i++) {
                 var visible = false;
                 td = tr[i].getElementsByTagName("td");
                 for (j = 0; j < td.length; j++) {
                     txtValue = td[j].textContent || td[j].innerText;
                     if (txtValue.toUpperCase().indexOf(filter) > -1) {
                         visible = true;
                         break;
                     }
                 }
                 tr[i].style.display = visible ? "" : "none";
             }
         }
 
         // Filter the table on input change
         $("#filterInput").on("input", function () {
             filterTable();
         });
     });
 </script>
 </div>
 
</div>
