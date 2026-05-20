import { Img, Section } from '@react-email/components';
import * as React from 'react';
import { theme } from '../styles/theme';

export const Header = () => {
  return (
    <Section style={headerContainer}>
      {/* Assuming the logo exists at this URL, but using a generic accessible text as fallback */}
      <Img 
        src="/static/logobuenacalidad.png" 
        width="120"
        height="auto"
        alt="UKIYO" 
        style={logoStyle} 
      />
    </Section>
  );
};

const headerContainer = {
  padding: '40px 48px',
  textAlign: 'center' as const,
};

const logoStyle = {
  margin: '0 auto',
  display: 'block',
};

export default Header;
