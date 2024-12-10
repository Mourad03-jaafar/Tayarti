package com.fsb.tp5.controller;

import java.util.ArrayList;
import java.util.List;

import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;

import com.fsb.tp5.model.request.costumer;

public class costumerController {
    private static List<costumer> costumers = new ArrayList<costumer>();
    private static long idCount = 0L;

    static {
        costumers.add(new costumer(idCount++, "demo1", "22222222", "demo1@gmail.com"));
        costumers.add(new costumer(idCount++, "demo2", "33333333", "demo2@gmail.com"));
        costumers.add(new costumer(idCount++, "demo31", "44444444", "demo3@gmail.com"));
    }

    @RequestMapping("/customer")
    public String getproducts(Model mo) {
        mo.addAttribute("costumers", costumers);
        return "costumer-list";
    }

    @GetMapping("/add-costumer")
    public String showProduct(Model mo) {

        mo.addAttribute("CustomerChange", new CustomerChange());
        return "add-product";

    }
}
