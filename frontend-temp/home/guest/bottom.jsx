import { Separator } from "@/components/ui/separator";
import React from "react";

export const TipsAndTricksSection = () => {
  // Navigation links data
  const navLinks = [
    { title: "Beranda", href: "#" },
    { title: "Resep", href: "#" },
    { title: "Tips Dapur", href: "#" },
  ];

  return (
    <section className="w-full bg-black py-8 text-white">
      <div className="container mx-auto flex flex-col items-center justify-center">
        <h2 className="font-extrabold text-[40px] [font-family:'Inter-ExtraBold',Helvetica] mb-4">
          COOK.
        </h2>

        <p className="max-w-[646px] text-2xl font-extrabold [font-family:'Inter-ExtraBold',Helvetica] text-center mb-6">
          From quick and easy meals to gourmet delights, we have something for
          every taste and occasion
        </p>

        <Separator className="bg-white w-[725px] mb-8" />

        <nav className="flex items-center gap-12">
          {navLinks.map((link, index) => (
            <a
              key={index}
              href={link.href}
              className="text-2xl font-extrabold [font-family:'Inter-ExtraBold',Helvetica] text-center"
            >
              {link.title}
            </a>
          ))}
        </nav>
      </div>
    </section>
  );
};

export default TipsAndTricksSection;
