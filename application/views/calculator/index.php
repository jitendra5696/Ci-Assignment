<form action="" id="calculator">
        <div class="text-center">
           <h3 class="mb-3">Calculator using PHP</h3>
           <div class="text-danger">
              </div>
           <div id="responce"></div>
           <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label fw-bold">Quantity-1</label>
              <input type="text" class="" id="num_1" name="num1" value="">
              </div>
           <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label fw-bold">Quantity-2</label>
              <input type="text" class="" id="num_2" name="num2" value="">
              </div>
           <div class="mb-3 ">
              <label for="exampleInputEmail1" class="form-label me-4 fw-bold">Result</label>
              <input type="text" class="" id="result" name="result" value="" readonly>
              <div class="text-center text-danger"></div>
             <div class="text-center text-danger" id="error"></div>
           </div>
        </div>
        <div class="text-center" id="operand">
           <span class="fw-bold">Operand :-</span>
           <a href="<?= base_url('Calculation/Calculator/');  ?>"><input type="submit" class="btn btn-primary" name="operator"  value="Add"></a>
           <a href="<?= base_url('Calculation/Calculator/');  ?>"><input type="submit" class="btn btn-success" name="operator"  value="Subtract"></a>
           <a href="<?= base_url('Calculation/Calculator/');  ?>"><input type="submit" class="btn btn-secondary" name="operator"  value="Multiply"></a>
           <a href="<?= base_url('Calculation/Calculator/');  ?>"><input type="submit" class="btn btn-warning"  name="operator"  value="Divide"></a>
        </div>
        <div class="conatiner mt-5">
         <div id="display_result">
            <table class="table table-bordered table-success table-striped mt-5">
               <thead class="table-dark">
                  <tr class="text-center">
                     <th scope="col">Data ID</th>
                     <th scope="col">Quantity 1</th>
                     <th scope="col">Quantity 2</th>
                     <th scope="col">Operator</th>
                     <th scope="col">Result</th>
                  </tr>
               </thead>
               <tbody id="">
               </tbody>
            </table>
         </div>
         </div>
      </form>
