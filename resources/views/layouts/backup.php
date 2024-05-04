
<script>

    // Add event listeners for each month's Estimator and Business Days input fields
    const months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'];

    // Function to calculate Walk-In values based on Estimator and Business Days for each month
    function calculateWalkIn(month) {
        const estimator = parseFloat(document.querySelector(`.form-control.${month}_estimator`).value) || 0;
        const businessDays = parseFloat(document.querySelector(`.form-control.${month}_business_days`).value) || 0;
        const walkIn = Math.floor(estimator * businessDays);

        // Set the calculated value to the corresponding Walk-In input field
        document.querySelector(`.form-control.${month}_walk_in`).value = walkIn;
    }

    months.forEach(month => {
        document.querySelector(`.form-control.${month}_estimator`).addEventListener('input', () => calculateWalkIn(month));
        document.querySelector(`.form-control.${month}_business_days`).addEventListener('input', () => calculateWalkIn(month));
    });

    // Function to calculate Total values based on Walk-In and Web Purchase for each month
    function calculateTotal(month) {
        const walk_In = parseFloat(document.querySelector(`.form-control.${month}_walk_in`).value) || 0;
        const webPurchase = parseFloat(document.querySelector(`.form-control.${month}_web_purchase`).value) || 0;
        const total = walk_In + webPurchase;

        // Set the calculated value to the corresponding Total input field
        document.querySelector(`.form-control.${month}_first_total`).value = total;
    }

    months.forEach(month => {
        document.querySelector(`.form-control.${month}_walk_in`).addEventListener('input', () => calculateTotal(month));
        document.querySelector(`.form-control.${month}_web_purchase`).addEventListener('input', () => calculateTotal(month));
    });

    // Function to calculate Second Total values based on First Total and Estimated Purchase % for each month
    function calculateSecondTotal(month) {
        const firstTotal = parseFloat(document.querySelector(`.form-control.${month}_first_total`).value) || 0;
        const estimatedPurchase = parseFloat(document.querySelector(`.form-control.${month}_estimated_purchase`).value) || 0;
        const secondTotal = firstTotal * (estimatedPurchase / 100);

        // Set the calculated value to the corresponding Second Total input field
        document.querySelector(`.form-control.${month}_second_total`).value = secondTotal.toFixed(2);
    }

    months.forEach(month => {
        document.querySelector(`.form-control.${month}_first_total`).addEventListener('input', () => calculateSecondTotal(month));
        document.querySelector(`.form-control.${month}_estimated_purchase`).addEventListener('input', () => calculateSecondTotal(month));
    });


    // Function to calculate Monthly Total Sales based on Second Total and $ Per Invoice for each month
    function calculateMonthlySales(month) {
        const second_total = parseFloat(document.querySelector(`.form-control.${month}_second_total`).value) || 0;
        const perInvoice = parseFloat(document.querySelector(`.form-control.${month}_per_invoice`).value) || 0;
        const monthlySales = second_total * perInvoice;

        // Set the calculated value to the corresponding Monthly Total Sales input field
        document.querySelector(`.form-control.${month}_monthly_sales`).value = monthlySales.toFixed(2);
    }

    months.forEach(month => {
        document.querySelector(`.form-control.${month}_second_total`).addEventListener('input', () => calculateMonthlySales(month));
        document.querySelector(`.form-control.${month}_per_invoice`).addEventListener('input', () => calculateMonthlySales(month));
    });
</script>