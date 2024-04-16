<script>
    let rowIdx = 0;
    function addPricingRow() {
        rowIdx++;
        const html = `
        <div class="row mb-2" id="pricingRow${rowIdx}">
            <div class="col-md-5">
                <input type="text" class="form-control" name="services[]" placeholder="Service Name" required>
            </div>
            <div class="col-md-5">
                <input type="number" class="form-control" name="prices[]" placeholder="Price" required>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger" onclick="removePricingRow(${rowIdx})">-</button>
            </div>
        </div>
    `;
        document.getElementById('pricingTable').insertAdjacentHTML('beforeend', html);
    }

    function removePricingRow(idx) {
        const row = document.getElementById(`pricingRow${idx}`);
        row.parentNode.removeChild(row);
    }
</script>
