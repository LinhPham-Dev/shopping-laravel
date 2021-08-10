<!-- getItemExits -->

<?php

// get id colors and sizes exits
if (!function_exists('getItemExits')) {
    function getItemExits($items)
    {
        $items_exits = [];

        if ($items) {
            foreach ($items as $item) {
                $items_exits[] = $item->id;
            };
        }

        return $items_exits;
    }
}

// Alert insert success
if (!function_exists('alertInsert')) {
    function alertInsert($result, $optionRoute)
    {
        if ($optionRoute) {
            if ($result) {
                $message = 'Insert record successfully !';
                return redirect()->route('products.index')->with('success', $message);
            } else {
                $message = 'Insert record failed !';
                return redirect()->back()->with('error', $message);
            }
        } else {
            if ($result) {
                $message = 'Insert record successfully !';
                return redirect()->back()->with('success', $message);
            } else {
                $message = 'Insert record failed !';
                return redirect()->back()->with('error', $message);
            }
        }
    }
}

// Alert update success
if (!function_exists('alertUpdate')) {
    function alertUpdate($result, $optionRoute)
    {
        if ($optionRoute) {
            if ($result) {
                $message = 'Update record successfully !';
                return redirect()->route('products.index')->with('success', $message);
            } else {
                $message = 'Update record failed !';
                return redirect()->back()->with('error', $message);
            }
        } else {
            if ($result) {
                $message = 'Update record successfully !';
                return redirect()->back()->with('success', $message);
            } else {
                $message = 'Update record failed !';
                return redirect()->back()->with('error', $message);
            }
        }
    }
}

// Alert update success
if (!function_exists('alertDelete')) {
    function alertDelete($result, $optionRoute)
    {
        if ($optionRoute) {
            if ($result) {
                $message = 'Delete record successfully !';
                return redirect()->route('products.index')->with('success', $message);
            } else {
                $message = 'Delete record failed !';
                return redirect()->back()->with('error', $message);
            }
        } else {
            if ($result) {
                $message = 'Delete record successfully !';
                return redirect()->back()->with('success', $message);
            } else {
                $message = 'Delete record failed !';
                return redirect()->back()->with('error', $message);
            }
        }
    }
}




?>
