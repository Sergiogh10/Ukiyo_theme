import { Button } from '@react-email/components';
import * as React from 'react';
import { theme } from '../styles/theme';

interface CTAButtonProps {
  href: string;
  children: React.ReactNode;
  align?: 'left' | 'center' | 'right';
  style?: React.CSSProperties;
}

export const CTAButton = ({ href, children, align = 'center', style }: CTAButtonProps) => {
  return (
    <div style={{ textAlign: align, margin: '32px 0' }}>
      <Button href={href} style={{ ...buttonStyle, ...style }}>
        {children}
      </Button>
    </div>
  );
};

const buttonStyle = {
  backgroundColor: theme.colors.primary,
  color: theme.colors.white,
  padding: '14px 28px',
  borderRadius: theme.radius.sm,
  fontSize: '15px',
  fontWeight: '600',
  textDecoration: 'none',
  display: 'inline-block',
  fontFamily: theme.fonts.main,
  border: `1px solid ${theme.colors.primaryDark}`,
};

export default CTAButton;
