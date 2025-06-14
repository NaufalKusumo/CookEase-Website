import { Separator } from "@/components/ui/separator";
import React from "react";

export default function RelatedRecipesSection() {
  // Navigation links data
  const navLinks = [
    { name: "Beranda", href: "#" },
    { name: "Resep", href: "#" },
    { name: "Tips Dapur", href: "#" },
  ];

  return (
    <footer className="w-full bg-black py-8 text-center">
      <div className="container mx-auto px-4">
        <h2 className="font-extrabold text-[40px] text-[#fffbfb] mb-4 [font-family:'Inter-ExtraBold',Helvetica]">
          COOK.
        </h2>

        <p className="font-extrabold text-2xl text-[#fffbfb] mx-auto max-w-2xl mb-6 [font-family:'Inter-ExtraBold',Helvetica]">
          From quick and easy meals to gourmet delights, we have something for
          every taste and occasion
        </p>

        <Separator className="bg-white h-px max-w-2xl mx-auto mb-8" />

        <nav>
          <ul className="flex justify-center gap-12">
            {navLinks.map((link, index) => (
              <li key={index}>
                <a
                  href={link.href}
                  className="font-extrabold text-2xl text-[#fffbfb] [font-family:'Inter-ExtraBold',Helvetica]"
                >
                  {link.name}
                </a>
              </li>
            ))}
          </ul>
        </nav>
      </div>
    </footer>
  );
}
