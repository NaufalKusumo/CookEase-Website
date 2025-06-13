import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { ChefHat, Search, ShoppingBag, User } from "lucide-react";
import React from "react";

export const NewRecipesSection = () => {
  const navItems = [
    { name: "Bestseller", active: true },
    { name: "Recipes", active: false },
    { name: "Menu", active: false },
  ];

  return (
    <section className="relative w-full h-[717px] bg-[url(/flat-lay-mozzarella-tomatoes-copy-space-1.png)] bg-cover bg-center">
      {/* Header with navigation */}
      <header className="flex items-center justify-between w-full p-6">
        {/* Logo */}
        <div className="flex items-center">
          <ChefHat className="w-10 h-10 text-brown" />
          <span className="ml-2 font-bold text-brown text-3xl font-['Outfit-Bold',Helvetica]">
            CookEase
          </span>
        </div>

        {/* Search bar */}
        <div className="relative max-w-md w-full mx-4">
          <Search className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 h-4 w-4" />
          <Input
            className="pl-10 pr-4 py-2 rounded-full border border-gray-300 w-full"
            placeholder="Can I help find/filter all the..."
          />
        </div>

        {/* Navigation */}
        <div className="flex items-center gap-6">
          {navItems.map((item) => (
            <Button
              key={item.name}
              variant={item.active ? "default" : "ghost"}
              className={`px-4 h-auto ${item.active ? "bg-yellow-400 hover:bg-yellow-500 text-black" : "text-black"}`}
            >
              {item.name}
            </Button>
          ))}
          <User className="w-6 h-6 text-gray-700" />
          <Button className="bg-red-500 hover:bg-red-600 text-white h-auto px-4 py-2 rounded-full">
            <ShoppingBag className="w-4 h-4 mr-2" />
            Request
          </Button>
        </div>
      </header>

      {/* Hero content */}
      <div className="max-w-md ml-12 mt-24">
        <h1 className="text-4xl font-bold text-gray-900 leading-tight mb-4">
          Cook Like a Pro With Our Easy And Tasty Recipes
        </h1>
        <p className="text-gray-700 mb-6">
          Discover simple, mouthwatering recipes that anyone can whip up in
          minutes
        </p>
        <Button className="bg-white hover:bg-gray-100 text-gray-900 border border-gray-300 h-auto px-6 py-2">
          Explore All Recipes
        </Button>
      </div>
    </section>
  );
};

export default NewRecipesSection;
