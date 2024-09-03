<div>
    
    <!---payment histroy-->
<div class="container-fluid payments">
    <div class="row justify-content-center flex-wrap p-3" style="border:0px solid green;margin-top:50px">
      <section class="col-md-5">
         <h3 class="fw-bold pt-3">Payment History</h3>
      </section>
      <section class="col-md-7 p-3">
       <aside class="d-flex float-end text-center p-3" style="width:100%;overflow-x:auto;border:0px solid green">
           <button>All</button>
           <button>Successful</button>
           <button>Pending</button>
           <button>Rejected</button>
       </aside>
      </section>
  <section class="col-md-12 px-3">
    <div class="input-group pull-right mb-3">
       <span class="input-group-text" id="basic-addon1">
         <i class="bi bi-search"></i>
       </span>
       <input type="text" id="filterInput" class="search form-control shadow-none" placeholder="Search Transaction">
   </div>
   <div class="table-responsive">
    <table class="table custom-table" id="myTable" cellspacing="10">
     <thead>
         <tr style="white-space:nowrap;">
         <th scope="col">S/N</th>
         <th scope="col">Transaction ID</th>
         <th scope="col">Name</th>
         <th scope="col">Amount</th>
         <th scope="col">Currency Type</th>
         <th scope="col">Date</th>
         <th scope="col">Status</th>
         </tr>
       </thead>
             <tbody style="white-space:nowrap;">
             <tr>
                 <td>
                   1
                 </td>
                 <td>#CHC67378287298</td>
                 <td>
                  <b class="fw-bold">Ogbonna Michael</b>
                  <p>michaelcharsac@gmail.com</p>
                 </td>
                 <td>$20,000</td>
                 <td><span><i class="bi bi-currency-exchange"></i>&nbsp;Bitcoin</span></td>
                 <td>Apr 20 2023</td>
                 <td><span>successful</span></td>
               </tr>
                <tr>
                 <td>
                   1
                 </td>
                 <td>#CHC7872929</td>
                 <td>
                  <b class="fw-bold">Ogbonna Michael</b>
                  <p>michaelcharsac@gmail.com</p>
                 </td>
                 <td>$20,000</td>
                 <td><span><i class="bi bi-currency-exchange"></i>&nbsp;Bitcoin</span></td>
                 <td>Apr 20 2023</td>
                 <td><span>successful</span></td>
               </tr>
                <tr>
                 <td>
                   1
                 </td>
                 <td>#CHC636292</td>
                 <td>
                  <b class="fw-bold">Ogbonna Michael</b>
                  <p>michaelcharsac@gmail.com</p>
                 </td>
                 <td>$20,000</td>
                 <td><span><i class="bi bi-currency-exchange"></i>&nbsp;Bitcoin</span></td>
                 <td>Apr 20 2023</td>
                 <td><span>successful</span></td>
               </tr>
                <tr>
                 <td>
                   1
                 </td>
                 <td>#CHC09893939</td>
                 <td>
                  <b class="fw-bold">Ogbonna Michael</b>
                  <p>michaelcharsac@gmail.com</p>
                 </td>
                 <td>$20,000</td>
                 <td><span><i class="bi bi-currency-exchange"></i>&nbsp;Bitcoin</span></td>
                 <td>Apr 20 2023</td>
                 <td><span>successful</span></td>
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
