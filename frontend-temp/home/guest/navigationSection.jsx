import { Input } from "@/components/ui/input";
import {
  NavigationMenu,
  NavigationMenuItem,
  NavigationMenuLink,
  NavigationMenuList,
} from "@/components/ui/navigation-menu";
import { Search } from "lucide-react";
import React from "react";

export default function NavigationSection() {
  // Navigation menu items data
  const menuItems = [
    { name: "Beranda", href: "#" },
    { name: "Resep", href: "#" },
    { name: "Tips Dapur", href: "#" },
  ];

  return (
    <header className="w-full py-2 px-4 flex items-center justify-between">
      {/* Logo Section */}
      <div className="flex items-center">
        <div className="relative h-[70px] w-[70px]">
          <img className="h-full w-full object-contain" alt="Chef hat" src="" />
        </div>
        <h1 className="ml-2 font-bold text-[32px] [font-family:'Outfit-Bold',Helvetica] text-brown">
          CookEase
        </h1>
      </div>

      {/* Search Bar */}
      <div className="relative max-w-md w-full mx-4">
        <div className="relative">
          <Search className="absolute left-2 top-1/2 transform -translate-y-1/2 h-4 w-4 text-gray-400" />
          <Input
            className="pl-8 pr-4 py-2 rounded-full border border-gray-300"
            placeholder="Cari resep favoritmu di sini"
          />
        </div>
      </div>

      {/* Navigation Menu */}
      <NavigationMenu>
        <NavigationMenuList className="flex space-x-8">
          {menuItems.map((item) => (
            <NavigationMenuItem key={item.name}>
              <NavigationMenuLink
                className="font-bold text-2xl [font-family:'Outfit-Bold',Helvetica] text-brown"
                href={item.href}
              >
                {item.name}
              </NavigationMenuLink>
            </NavigationMenuItem>
          ))}
        </NavigationMenuList>
      </NavigationMenu>
    </header>
  );
}
