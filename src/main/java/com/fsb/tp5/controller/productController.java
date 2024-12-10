package com.fsb.tp5.controller;

import java.util.ArrayList;
import java.util.List;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;

import com.fsb.tp5.model.product;
import com.fsb.tp5.model.request.productForm;

@Controller
public class productController {

    private static List<product> products = new ArrayList<product>();
    private static long idCount = 0L;

    static {
        products.add(new product(idCount++, "good-k21", "Canon Camera", 870, "Canon.jpg"));
        products.add(new product(idCount++, "hi987-jjl", "Iphone 15 Pro Maw", 1120, "iphone.jpg"));
        products.add(new product(idCount++, "bb-452", "Huawei P-60", 1200, "huawei.jpg"));
        products.add(new product(idCount++, "jj-d17", "Nokia", 540, "nokia.jpg"));
    }

    @RequestMapping("/products")
    public String getproducts(Model model) {

        model.addAttribute("products", products);
        return "products-list";
    }

    @GetMapping("/add-product")
    public String showAddproduct(Model model) {

        model.addAttribute("productForm", new productForm());
        return "add-product";
    }

    @PostMapping("/add-product")
    public String saveproduct(@ModelAttribute("productForm") productForm productForm,
            Model model) {
        products.add(new product(idCount++, productForm.getCode(), productForm.getNom(), productForm.getPrix(),
                productForm.getImage()));
        return "redirect:/products";
    }

    @GetMapping("/delete-product/{id}")
    public String deleteproduct(@PathVariable("id") int id) {

        for (product product : products) {
            if (product.getId() == id) {
                this.products.remove(product);
                return "redirect:/products";
            }
        }
        return "redirect:/products";
    }

    @GetMapping("/update-product/{id}")
    public String showUpdateproduct(@PathVariable("id") int id, Model model) {
        model.addAttribute("productForm", new productForm());
        for (product product : this.products) {
            if (product.getId() == id) {
                model.addAttribute("productForm",
                        new productForm(product.getCode(), product.getNom(), product.getPrix(), product.getImage()));
                model.addAttribute("id", id);
                return "update-product";
            }
        }
        return "redirect:/products";

    }

    @PostMapping("/update-product/{id}")
    public String updateproduct(
            @PathVariable("id") int id,
            @ModelAttribute("productForm") productForm productForm) {
        for (product product : products) {
            if (product.getId() == id) {
                product.setCode(productForm.getCode());
                product.setNom(productForm.getNom());
                product.setPrix(productForm.getPrix());
                product.setImage(productForm.getImage());
                break;
            }
        }
        return "redirect:/products";

    }

}
