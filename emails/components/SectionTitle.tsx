import { Heading } from '@react-email/components';
import * as React from 'react';
import { theme } from '../styles/theme';

interface SectionTitleProps {
  children: React.ReactNode;
  as?: 'h1' | 'h2' | 'h3';
  style?: React.CSSProperties;
}

export const SectionTitle = ({ children, as = 'h2', style }: SectionTitleProps) => {
  const getStyle = () => {
    switch (as) {
      case 'h1': return h1Style;
      case 'h3': return h3Style;
      case 'h2':
      default: return h2Style;
    }
  };

  return (
    <Heading as={as} style={{ ...getStyle(), ...style }}>
      {children}
    </Heading>
  );
};

const h1Style = {
  fontSize: '28px',
  lineHeight: '36px',
  fontWeight: '400',
  color: theme.colors.primaryDark,
  margin: '0 0 24px 0',
  fontFamily: theme.fonts.heading,
};

const h2Style = {
  fontSize: '22px',
  lineHeight: '30px',
  fontWeight: '600',
  color: theme.colors.textMain,
  margin: '0 0 20px 0',
  fontFamily: theme.fonts.heading,
};

const h3Style = {
  fontSize: '18px',
  lineHeight: '26px',
  fontWeight: '600',
  color: theme.colors.textMain,
  margin: '0 0 16px 0',
  fontFamily: theme.fonts.heading,
};

export default SectionTitle;
