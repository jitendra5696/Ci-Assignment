<div class="text-center">
         <h4 class="mb-3">Enter No. of Units here</h4>
         <form action="" id="electricity_bill">
            <div class="mb-3">
               <label for="units" class="form-label fw-bold">Units :</label>
               <input type="text" class="mb-3" id="exampleInputEmail1" name="units" placeholder="No. of units" value=""><br>
               <label for="exampleInputEmail1" class="form-label fw-bold me-3">Bill :</label>
               <input type="text" class="" name="bill" id="total_bill" value="" placeholder="Total Bill" disabled>
               <div id="error" class="text-danger text-center"></div>
            </div>
            <button type="submit" id="bill_calculate" class="btn btn-primary">Calculate Bill</button>
         </form>
         <div class="container mt-4" id="display_result">
            <table class="table table-bordered table-success table-striped mt-5">
               <thead class="table-dark">
                  <tr>
                     <th scope="col">Bill ID</th>
                     <th scope="col">Units</th>
                     <th scope="col">Total Bill</th>
                  </tr>
               </thead>
               <tbody class="">

               </tbody>
            </table>
         </div>
      </div>
