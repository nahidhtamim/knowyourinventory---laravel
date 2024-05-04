public function save_daily_update(Request $request)
    {
        // Initialize arrays to store category data
        $goalsData = [];
        $dayData = [];
        $nameOneSalesData = [];
        $nameOneInvData = [];
        $nameOneLinesData = [];
        $nameTwoSalesData = [];
        $nameTwoInvData = [];
        $nameTwoLinesData = [];
        $nameThreeSalesData = [];
        $nameThreeInvData = [];
        $nameThreeLinesData = [];
        $nameFourSalesData = [];
        $nameFourInvData = [];
        $nameFourLinesData = [];

        $moTotalGoalData = [];
        $moTotalSalesData = [];
        $moTotalInvData = [];
        $moTotalLinesData = [];
        $moTotalLpiData = [];
        $moTotalDlrInvData = [];

        $moNameOneSalesData = [];
        $moNameOneInvData = [];
        $moNameOneLinesData = [];
        $moNameOneLpiData = [];
        $moNameOneDlrInvData = [];
        $moNameTwoSalesData = [];
        $moNameTwoInvData = [];
        $moNameTwoLinesData = [];
        $moNameTwoLpiData = [];
        $moNameTwoDlrInvData = [];
        $moNameThreeSalesData = [];
        $moNameThreeInvData = [];
        $moNameThreeLinesData = [];
        $moNameThreeLpiData = [];
        $moNameThreeDlrInvData = [];
        $moNameFourSalesData = [];
        $moNameFourInvData = [];
        $moNameFourLinesData = [];
        $moNameFourLpiData = [];
        $moNameFourDlrInvData = [];

        $dailyRetailData = [];
        $dailyLy1Data = [];
        $dailyCostData = [];
        $dailyMarginData = [];
        $dailySalesGoalData = [];
        $dailyOu1Data = [];
        $dailyCurrentData = [];
        $dailyLy2Data = [];
        $dailyGoalData = [];
        $dailyOu2Data = [];


        // Loop through categories (assuming 28 categories)
        for ($i = 1; $i <= 31; $i++) {
            $goalsData[$i] = $this->getDataFields($request, 'goals_' . $i);
            $dayData[$i] = $this->getDataFields($request, 'day_' . $i);
            $nameOneSalesData[$i] = $this->getDataFields($request, 'name_one_sales_' . $i);
            $nameOneInvData[$i] = $this->getDataFields($request, 'name_one_inv_' . $i);
            $nameOneLinesData[$i] = $this->getDataFields($request, 'name_one_lines_' . $i);
            $nameTwoSalesData[$i] = $this->getDataFields($request, 'name_two_sales_' . $i);
            $nameTwoInvData[$i] = $this->getDataFields($request, 'name_two_inv_' . $i);
            $nameTwoLinesData[$i] = $this->getDataFields($request, 'name_two_lines_' . $i);
            $nameThreeSalesData[$i] = $this->getDataFields($request, 'name_three_sales_' . $i);
            $nameThreeInvData[$i] = $this->getDataFields($request, 'name_three_inv_' . $i);
            $nameThreeLinesData[$i] = $this->getDataFields($request, 'name_three_lines_' . $i);
            $nameFourSalesData[$i] = $this->getDataFields($request, 'name_four_sales_' . $i);
            $nameFourInvData[$i] = $this->getDataFields($request, 'name_four_inv_' . $i);
            $nameFourLinesData[$i] = $this->getDataFields($request, 'name_four_lines_' . $i);
    
            $moTotalGoalData[$i] = $this->getDataFields($request, 'mo_total_goal_' . $i);
            $moTotalSalesData[$i] = $this->getDataFields($request, 'mo_total_sales_' . $i);
            $moTotalInvData[$i] = $this->getDataFields($request, 'mo_total_inv_' . $i);
            $moTotalLinesData[$i] = $this->getDataFields($request, 'mo_total_lines_' . $i);
            $moTotalLpiData[$i] = $this->getDataFields($request, 'mo_total_LPI_' . $i);
            $moTotalDlrInvData[$i] = $this->getDataFields($request, 'mo_total_dlr_inv_' . $i);
    
            $moNameOneSalesData[$i] = $this->getDataFields($request, 'mo_name_one_sales_' . $i);
            $moNameOneInvData[$i] = $this->getDataFields($request, 'mo_name_one_inv_' . $i);
            $moNameOneLinesData[$i] = $this->getDataFields($request, 'mo_name_one_lines_' . $i);
            $moNameOneLpiData[$i] = $this->getDataFields($request, 'mo_name_one_LPI_' . $i);
            $moNameOneDlrInvData[$i] = $this->getDataFields($request, 'mo_name_one_dlr_inv_' . $i);
            $moNameTwoSalesData[$i] = $this->getDataFields($request, 'mo_name_two_sales_' . $i);
            $moNameTwoInvData[$i] = $this->getDataFields($request, 'mo_name_two_inv_' . $i);
            $moNameTwoLinesData[$i] = $this->getDataFields($request, 'mo_name_two_lines_' . $i);
            $moNameTwoLpiData[$i] = $this->getDataFields($request, 'mo_name_two_LPI_' . $i);
            $moNameTwoDlrInvData[$i] = $this->getDataFields($request, 'mo_name_two_dlr_inv_' . $i);
            $moNameThreeSalesData[$i] = $this->getDataFields($request, 'mo_name_three_sales_' . $i);
            $moNameThreeInvData[$i] = $this->getDataFields($request, 'mo_name_three_inv_' . $i);
            $moNameThreeLinesData[$i] = $this->getDataFields($request, 'mo_name_three_lines_' . $i);
            $moNameThreeLpiData[$i] = $this->getDataFields($request, 'mo_name_three_LPI_' . $i);
            $moNameThreeDlrInvData[$i] = $this->getDataFields($request, 'mo_name_three_dlr_inv_' . $i);
            $moNameFourSalesData[$i] = $this->getDataFields($request, 'mo_name_four_sales_' . $i);
            $moNameFourInvData[$i] = $this->getDataFields($request, 'mo_name_four_inv_' . $i);
            $moNameFourLinesData[$i] = $this->getDataFields($request, 'mo_name_four_lines_' . $i);
            $moNameFourLpiData[$i] = $this->getDataFields($request, 'mo_name_four_LPI_' . $i);
            $moNameFourDlrInvData[$i] = $this->getDataFields($request, 'mo_name_four_dlr_inv_' . $i);
    
            $dailyRetailData[$i] = $this->getDataFields($request, 'daily_retail_' . $i);
            $dailyLy1Data[$i] = $this->getDataFields($request, 'daily_ly1_' . $i);
            $dailyCostData[$i] = $this->getDataFields($request, 'daily_cost_' . $i);
            $dailyMarginData[$i] = $this->getDataFields($request, 'daily_margin_' . $i);
            $dailySalesGoalData[$i] = $this->getDataFields($request, 'daily_sales_goal_' . $i);
            $dailyOu1Data[$i] = $this->getDataFields($request, 'daily_ou1_' . $i);
            $dailyCurrentData[$i] = $this->getDataFields($request, 'daily_current_' . $i);
            $dailyLy2Data[$i] = $this->getDataFields($request, 'daily_ly2_' . $i);
            $dailyGoalData[$i] = $this->getDataFields($request, 'daily_goal_' . $i);
            $dailyOu2Data[$i] = $this->getDataFields($request, 'daily_ou2_' . $i);
        }


        // Create a new entry in the database using Eloquent
        $dailyUpdateData = [
            'title' => $request->title,
            'user_id' => Auth::user()->id,
            'name_one' => $request->name_one,
            'amount_one' => $request->amount_one,
            'name_two' => $request->name_two,
            'amount_two' => $request->amount_two,
            'name_three' => $request->name_three,
            'amount_three' => $request->amount_three,
            'name_four' => $request->name_four,
            'total_amount' => $request->total_amount,
            'goals_sum' => $request->goals_sum,
            'name_one_sales_sum' => $request->name_one_sales_sum,
            'name_one_inv_sum' => $request->name_one_inv_sum,
            'name_one_lines_sum' => $request->name_one_lines_sum,
            'name_two_sales_sum' => $request->name_two_sales_sum,
            'name_two_inv_sum' => $request->name_two_inv_sum,
            'name_two_lines_sum' => $request->name_two_lines_sum,
            'name_three_sales_sum' => $request->name_three_sales_sum,
            'name_three_inv_sum' => $request->name_three_inv_sum,
            'name_three_lines_sum' => $request->name_three_lines_sum,
            'name_four_sales_sum' => $request->name_four_sales_sum,
            'name_four_inv_sum' => $request->name_four_inv_sum,
            'name_four_lines_sum' => $request->name_four_lines_sum,

            'mo_total_goal_sum' => $request->mo_total_goal_sum,
            'mo_total_sales_sum' => $request->mo_total_sales_sum,
            'mo_total_inv_sum' => $request->mo_total_inv_sum,
            'mo_total_lines_sum' => $request->mo_total_lines_sum,
            'mo_total_LPI_sum' => $request->mo_total_LPI_sum,
            'mo_total_dlr_inv_sum' => $request->mo_total_dlr_inv_sum,
            'mo_name_one_sales_sum' => $request->mo_name_one_sales_sum,
            'mo_name_one_inv_sum' => $request->mo_name_one_inv_sum,
            'mo_name_one_lines_sum' => $request->mo_name_one_lines_sum,
            'mo_name_one_LPI_sum' => $request->mo_name_one_LPI_sum,
            'mo_name_one_dlr_inv_sum' => $request->mo_name_one_dlr_inv_sum,
            'mo_name_two_sales_sum' => $request->mo_name_two_sales_sum,
            'mo_name_two_inv_sum' => $request->mo_name_two_inv_sum,
            'mo_name_two_lines_sum' => $request->mo_name_two_lines_sum,
            'mo_name_two_LPI_sum' => $request->mo_name_two_LPI_sum,
            'mo_name_two_dlr_inv_sum' => $request->mo_name_two_dlr_inv_sum,
            'mo_name_three_sales_sum' => $request->mo_name_three_sales_sum,
            'mo_name_three_inv_sum' => $request->mo_name_three_inv_sum,
            'mo_name_three_lines_sum' => $request->mo_name_three_lines_sum,
            'mo_name_three_LPI_sum' => $request->mo_name_three_LPI_sum,
            'mo_name_three_dlr_inv_sum' => $request->mo_name_three_dlr_inv_sum,
            'mo_name_four_sales_sum' => $request->mo_name_four_sales_sum,
            'mo_name_four_inv_sum' => $request->mo_name_four_inv_sum,
            'mo_name_four_lines_sum' => $request->mo_name_four_lines_sum,
            'mo_name_four_LPI_sum' => $request->mo_name_four_LPI_sum,
            'mo_name_four_dlr_inv_sum' => $request->mo_name_four_dlr_inv_sum,

            'total_dept_goal' => $request->total_dept_goal,
            'total_dept_sale' => $request->total_dept_sale,
            'total_dept_pace' => $request->total_dept_pace,
            'name_one_dept_goal' => $request->name_one_dept_goal,
            'name_one_dept_sale' => $request->name_one_dept_sale,
            'name_two_dept_goal' => $request->name_two_dept_goal,
            'name_two_dept_sale' => $request->name_two_dept_sale,
            'name_three_dept_goal' => $request->name_three_dept_goal,
            'name_three_dept_sale' => $request->name_three_dept_sale,
            'name_four_dept_goal' => $request->name_four_dept_goal,
            'name_four_dept_sale' => $request->name_four_dept_sale,
            
            'sales_standing_one_value' => $request->sales_standing_one_value,
            'sales_standing_two_value' => $request->sales_standing_two_value,
            'sales_standing_three_value' => $request->sales_standing_three_value,
            'sales_standing_four_value' => $request->sales_standing_four_value,
            
            'dlr_per_inv_one_value' => $request->dlr_per_inv_one_value,
            'dlr_per_inv_two_value' => $request->dlr_per_inv_two_value,
            'dlr_per_inv_three_value' => $request->dlr_per_inv_three_value,
            'dlr_per_inv_four_value' => $request->dlr_per_inv_four_value,
            'total_LPI_one_value' => $request->total_LPI_one_value,
            'total_LPI_two_value' => $request->total_LPI_two_value,
            'total_LPI_three_value' => $request->total_LPI_three_value,
            'total_LPI_four_value' => $request->total_LPI_four_value,

            'daily_date_sum' => $request->daily_date_sum,
            'daily_retail_sum' => $request->daily_retail_sum,
            'daily_ly1_sum' => $request->daily_ly1_sum,
            'daily_cost_sum' => $request->daily_cost_sum,
            
            'daily_margin_sum' => $request->daily_margin_sum,
            'daily_sales_goal_sum' => $request->daily_sales_goal_sum,
            'daily_ou1_sum' => $request->daily_ou1_sum,
            'daily_current_sum' => $request->daily_current_sum,
            'daily_ly2_sum' => $request->daily_ly2_sum,
            'daily_goal_sum' => $request->daily_goal_sum,
            'daily_ou2_sum' => $request->daily_ou2_sum,
            'daily_tracking' => $request->daily_tracking,
            'daily_actual' => $request->daily_actual,
            'daily_actual_goal' => $request->daily_actual_goal,
            'daily_on_track' => $request->daily_on_track,
            'daily_no_business_days' => $request->daily_no_business_days,
            'daily_on_above_below' => $request->daily_on_above_below,
        ];

        // Add category data to the cycle count data
        for ($i = 1; $i <= 31; $i++) {
            $dailyUpdateData['goals_' . $i] = $goalsData[$i];
            $dailyUpdateData['day_' . $i] = json_encode($dayData[$i]);

            $dailyUpdateData['name_one_sales_' . $i] = json_encode($nameOneSalesData[$i]);
            $dailyUpdateData['name_one_inv_' . $i] = json_encode($nameOneInvData[$i]);
            $dailyUpdateData['name_one_lines_' . $i] = json_encode($nameOneLinesData[$i]);
            $dailyUpdateData['name_two_sales_' . $i] = json_encode($nameTwoSalesData[$i]);
            $dailyUpdateData['name_two_inv_' . $i] = json_encode($nameTwoInvData[$i]);
            $dailyUpdateData['name_two_lines_' . $i] = json_encode($nameTwoLinesData[$i]);
            $dailyUpdateData['name_three_sales_' . $i] = json_encode($nameThreeSalesData[$i]);
            $dailyUpdateData['name_three_inv_' . $i] = json_encode($nameThreeInvData[$i]);
            $dailyUpdateData['name_three_lines_' . $i] = json_encode($nameThreeLinesData[$i]);
            $dailyUpdateData['name_four_sales_' . $i] = json_encode($nameFourSalesData[$i]);
            $dailyUpdateData['name_four_inv_' . $i] = json_encode($nameFourInvData[$i]);
            $dailyUpdateData['name_four_lines_' . $i] = json_encode($nameFourLinesData[$i]);

            $dailyUpdateData['mo_total_goal_' . $i] = json_encode($moTotalGoalData[$i]);
            $dailyUpdateData['mo_total_sales_' . $i] = json_encode($moTotalSalesData[$i]);
            $dailyUpdateData['mo_total_inv_' . $i] = json_encode($moTotalInvData[$i]);
            $dailyUpdateData['mo_total_lines_' . $i] = json_encode($moTotalLinesData[$i]);
            $dailyUpdateData['mo_total_LPI_' . $i] = json_encode($moTotalLpiData[$i]);
            $dailyUpdateData['mo_total_dlr_inv_' . $i] = json_encode($moTotalDlrInvData[$i]);

            $dailyUpdateData['mo_name_one_sales_' . $i] = json_encode($moNameOneSalesData[$i]);
            $dailyUpdateData['mo_name_one_inv_' . $i] = json_encode($moNameOneInvData[$i]);
            $dailyUpdateData['mo_name_one_lines_' . $i] = json_encode($moNameOneLinesData[$i]);
            $dailyUpdateData['mo_name_one_LPI_' . $i] = json_encode($moNameOneLpiData[$i]);
            $dailyUpdateData['mo_name_one_dlr_inv_' . $i] = json_encode($moNameOneDlrInvData[$i]);
            $dailyUpdateData['mo_name_two_sales_' . $i] = json_encode($moNameTwoSalesData[$i]);
            $dailyUpdateData['mo_name_two_inv_' . $i] = json_encode($moNameTwoInvData[$i]);
            $dailyUpdateData['mo_name_two_lines_' . $i] = json_encode($moNameTwoLinesData[$i]);
            $dailyUpdateData['mo_name_two_LPI_' . $i] = json_encode($moNameTwoLpiData[$i]);
            $dailyUpdateData['mo_name_two_dlr_inv_' . $i] = json_encode($moNameTwoDlrInvData[$i]);
            $dailyUpdateData['mo_name_three_sales_' . $i] = json_encode($moNameThreeSalesData[$i]);
            $dailyUpdateData['mo_name_three_inv_' . $i] = json_encode($moNameThreeInvData[$i]);
            $dailyUpdateData['mo_name_three_lines_' . $i] = json_encode($moNameThreeLinesData[$i]);
            $dailyUpdateData['mo_name_three_LPI_' . $i] = json_encode($moNameThreeLpiData[$i]);
            $dailyUpdateData['mo_name_three_dlr_inv_' . $i] = json_encode($moNameThreeDlrInvData[$i]);
            $dailyUpdateData['mo_name_four_sales_' . $i] = json_encode($moNameFourSalesData[$i]);
            $dailyUpdateData['mo_name_four_inv_' . $i] = json_encode($moNameFourInvData[$i]);
            $dailyUpdateData['mo_name_four_lines_' . $i] = json_encode($moNameFourLinesData[$i]);
            $dailyUpdateData['mo_name_four_LPI_' . $i] = json_encode($moNameFourLpiData[$i]);
            $dailyUpdateData['mo_name_four_dlr_inv_' . $i] = json_encode($moNameFourDlrInvData[$i]);
        
            $dailyUpdateData['daily_retail_' . $i] = json_encode($dailyRetailData[$i]);
            $dailyUpdateData['daily_ly1_' . $i] = json_encode($dailyLy1Data[$i]);
            $dailyUpdateData['daily_cost_' . $i] = json_encode($dailyCostData[$i]);
            $dailyUpdateData['daily_margin_' . $i] = json_encode($dailyMarginData[$i]);
            $dailyUpdateData['daily_sales_goal_' . $i] = json_encode($dailySalesGoalData[$i]);
            $dailyUpdateData['daily_ou1_' . $i] = json_encode($dailyOu1Data[$i]);
            $dailyUpdateData['daily_current_' . $i] = json_encode($dailyCurrentData[$i]);
            $dailyUpdateData['daily_ly2_' . $i] = json_encode($dailyLy2Data[$i]);
            $dailyUpdateData['daily_goal_' . $i] = json_encode($dailyGoalData[$i]);
            $dailyUpdateData['daily_ou2_' . $i] = json_encode($dailyOu2Data[$i]);
        }

        // Debugging: Dump and die the request data
        // dd($request->all());

        // Save the data to the database
        DailyUpdate::create($dailyUpdateData);

        return redirect()->back()->with('status', 'Your data saved successfully');
    }